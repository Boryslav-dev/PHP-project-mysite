<?php $session = new Framework\Session\Session();
if ($session->cookieExists()) {
    $session->start();
}
if ($session->contains('name') == false): ?>
    <div class="cart-text mt-5">
        <p style="color: darkred">Вы не можете оформить заказ пока не зайдете в сеть</p>
        <a href="/login/" class="btn btn-outline-dark ms-5">Login</a>
    </div>
<?php else:?>
<cart></cart>
<?php endif; ?>