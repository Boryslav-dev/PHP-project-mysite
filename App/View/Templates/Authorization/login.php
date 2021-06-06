<?php $session = new Framework\Session\Session(); ?>
<main class="main text-center align-item-center d-flex justify-content-center form-signin mt-5">
  <form action="/login/send/" method="post">
    <img class="mb-4" src="" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <label for="inputEmail" class="visually-hidden">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control mb-2" placeholder="Email address" value="<?php echo($session->get('email'));?>" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <p style="color: red" class="mt-3"><?php
          $session->start();
          echo($session->get('message'));
          ?></p>
    <button class="w-100 btn btn-lg btn-primary mt-5" name="submit" type="submit">Sign in</button>
  </form>
</main>
