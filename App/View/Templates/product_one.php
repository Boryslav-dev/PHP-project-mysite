
<main>
    <div class="card mb-3 mt-5" style="max-width: 1080px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="..." alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo($params->getName());?></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text">Цена: <?php echo($params->getPrice());?></p>
                    <?php $session = new Framework\Session\Session();
                    if ($session->cookieExists()) {
                        $session->start();
                    }
                    if ($session->contains('name') == false): ?>
                        <div class="cart-text">
                            <p style="color: darkred">Вы не можете сделать заказ пока не зайдете в сеть</p>
                            <a href="/login/" class="btn btn-outline-dark ms-5">Login</a>
                        </div>
                    <?php else:?>
                        <cart_card   :key="<?php echo($params->getId());?>"
                                :id="<?php echo($params->getId());?>"
                                :name="'<?php echo($params->getName());?>'"
                                :price="<?php echo($params->getPrice());?>"
                        ></cart_card>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>
