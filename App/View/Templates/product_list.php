<main>
    <div class="container mt-5">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($params as $products => $items):?>
        <div class="col">
          <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" img="..." role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
            <div class="card-body">
                <p><?php echo($items['name']); ?></p>
              <p class="card-text">
                <p></p>
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a class="btn btn-small" href="/product/<?php echo($items['id'])?>">More</a>
                </div>
                <small class="text-muted">9 mins</small>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
</main>
