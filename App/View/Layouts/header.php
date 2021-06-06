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
            <?php endif; ?>
        </div>
    </div>
</header>