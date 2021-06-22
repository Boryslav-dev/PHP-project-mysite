<?php $session = new Framework\Session\Session(); ?>

<a type="button" class="btn btn-success btn-big m-5" href="/createProduct/">Create new Product</a>

<?php if($session->contains('message')):?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <?php
    $session->start();
    echo($session->get('message'));
    ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif;?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Count</th>
        <th scope="col">Created at</th>
        <th scope="col">Last update</th>
        <th scope="col">#</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($params as $item): ?>
    <tr>
        <th scope="row"><a class="link-info" href="/updateProductPage/<?= $item['id']; ?>/">Change</a></th>
        <td><?php echo($item['name']); ?></td>
        <td><?php echo($item['price']); ?></td>
        <td><?php echo($item['count']); ?></td>
        <td><?php echo($item['created_at']); ?></td>
        <td><?php echo($item['updated_at']); ?></td>
        <th scope="row"><a class="link-info" href="/deleteProduct/<?= $item['id']; ?>/">Delete</a></th>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>
