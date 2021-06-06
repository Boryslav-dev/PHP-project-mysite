<?php

namespace Framework\Session;

class Session
{
    public function setName($name): void
    {
        $_SESSION['name'] = $name;
    }

    public function getName(): string
    {
        if (isset($_SESSION['name'])) {
            return $_SESSION['name'];
        }
    }

    public function setId($id): void
    {
        if ($this->sessionExists() == true) {
            session_id($id);
        }
    }

    public function getId(): string
    {
        return session_id();
    }

    public function cookieExists(): bool
    {
        $sessionName = session_name();
        if (isset($_COOKIE[$sessionName]) || isset($_REQUEST[$sessionName])) {
            return true;
        }
        return false;
    }

    public function sessionExists(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            return false;
        } else {
            return true;
        }
    }

    public function start(): bool
    {
        if (($this->sessionExists() == false)) {
            session_start();
            return true;
        }
        return false;
    }

    public function destroy(): void
    {
        if ($this->sessionExists() == true || $this->cookieExists() == true) {
            // Unset all of the session variables.
            $_SESSION = array();
            // If it's desired to kill the session, also delete the session cookie.
            // Note: This will destroy the session, and not just the session data!
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(
                    session_name(),
                    '',
                    time() - 42000,
                    $params["path"],
                    $params["domain"],
                    $params["secure"],
                    $params["httponly"]
                );
            }
            // Finally, destroy the session.
            session_destroy();
        }
    }

    public function setSavePath($savePath): void
    {
        if (session_save_path() != $savePath) {
            if (is_dir($savePath)) {
                session_save_path($savePath);
            } else {
                mkdir($savePath, 777);
                session_save_path($savePath);
            }
        }
    }

    public function set($key, $value): void
    {
        if ($this->sessionExists() == true) {
            $_SESSION[$key] = $value;
        }
    }

    public function get($key)
    {
        if ($this->contains($key) == true) {
            return $_SESSION[$key];
        }
    }

    public function contains($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function delete($key): void
    {
        if ($this->contains($key) == true) {
            unset($_SESSION[$key]);
        }
    }
}
