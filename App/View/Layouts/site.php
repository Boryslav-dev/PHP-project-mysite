<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MySite</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="/css/style.css" type="text/css" rel="stylesheet">
  <!-- JS -->
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

 <script src="../../../public/js/app.js" defer></script>
</head>
<body>
<!-- Header -->
<div id="cart">
<?php include "header.php"; ?>
</div>
<div id="content">
  <div class="box container">
      <div id="app">
        <!-- Content -->
        <?php include 'App/View/Templates/' . $template; ?>
      </div>
  </div>
  <br class="clearfix" />
</div>
<br class="clearfix" />
<!-- Footer -->
<?php include "footer.php"; ?>
</body>
</html>