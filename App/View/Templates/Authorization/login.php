
<main class="main text-center align-item-center d-flex justify-content-center form-signin mt-5">
  <form action="/login" method="post">
    <img class="mb-4" src="" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
    <label for="inputLogin" class="visually-hidden">Login</label>
    <input type="text" name="login" id="inputLogin" class="form-control" placeholder="Login" required autofocus>
    <label for="inputPassword" class="visually-hidden">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
    <button class="w-100 btn btn-lg btn-primary mt-5" name="submit" type="submit">Sign in</button>
      <?php echo $message; ?>
  </form>
</main>
