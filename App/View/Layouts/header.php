<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <span class="fs-4 me-5">Internet-SHOP</span>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 text-secondary">Home</a></li>
                <li><a href="/" class="nav-link px-2 text-white">Product List</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Bucket</a></li>
            </ul>
            <?php $session = new Framework\Session\Session();
            if ($session->cookieExists()) {
                $session->start();
            }
            if ($session->contains('name') == false): ?>
            <div class="text-end">
                <a href="/login/" class="btn btn-outline-light me-2">Login</a>
                <a href="/register/" class="btn btn-warning">Sign-up</a>
            </div>
            <?php else:
                echo($session->getName());
            ?>
            <div class="text-end ms-5">
                <a href="/logout/" class="btn btn-outline-light me-2">LogOut</a>
            </div>
            <button type="button" class="btn btn-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"></path>
                </svg>
            </button>
            <?php endif; ?>
        </div>
    </div>
</header>