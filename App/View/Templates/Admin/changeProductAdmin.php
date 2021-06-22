<?php $session = new Framework\Session\Session();
$session->start();?>

<div class="main text-center align-item-center d-flex justify-content-center mt-5">
    <div class="row">
            <h4 class="mb-3">Product Menu</h4>
            <form action="/createProductSend/" method="post" class="needs-validation" novalidate="">
                <div class="row">


                    <div class="col-sm-3">
                        <label for="firstName" class="form-label">Product Name</label>
                        <input type="text" name="name" class="form-control" id="firstName" placeholder="" value="" required="">
                        <div class="invalid-feedback">
                            Valid name is required.
                        </div>
                    </div>

                    <div class="col-3">
                        <label for="username" class="form-label">Price</label>
                        <div class="input-group has-validation">
                            <input type="text" name="price" class="form-control" id="username" required="">
                            <div class="invalid-feedback">
                                Price is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="text" class="form-label">Count <span class="text-muted">(Optional)</span></label>
                        <input type="text" name="count" class="form-control">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="category" class="form-label">Category:</label>
                        <select class="form-select" name="category" id="category" required="">
                            <?php foreach ($params as $item): ?>
                            <option value="<?php echo($item['id'])?>"><?php echo($item['name']);?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback">
                            Please provide a valid state.
                        </div>
                    </div>
                </div>

                <p style="color: red" class="mt-3"><?php
                    echo($session->get('message'));
                    ?></p>

                <hr class="my-4">

                <button class="w-50 btn btn-primary btn-lg" name="submit" type="submit">Save</button>
            </form>
    </div>
</div>