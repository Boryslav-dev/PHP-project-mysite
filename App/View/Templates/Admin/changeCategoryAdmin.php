<?php $session = new Framework\Session\Session();
$session->start();?>

<div class="main text-center align-item-center d-flex justify-content-center mt-5">
    <div class="row">
        <h4 class="mb-3">Category Menu</h4>
        <form action="/createCategorySend/" method="post" class="needs-validation" novalidate="">
            <div class="row">

                <div class="col">
                    <label for="firstName" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="firstName" placeholder="" value="" required="">
                    <div class="invalid-feedback">
                        Valid name is required.
                    </div>
                </div>

            <p style="color: red" class="mt-3"><?php
                echo($session->get('message'));
                ?></p>

            <hr class="my-4">
            <button class="w-100 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
        </form>
    </div>
</div>