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
</head>
<body>
<!-- Header -->
<?php include "header.php"; ?>
<div id="content">
  <div class="box">
    <!-- Content -->
      <?php include 'App/View/Templates/' . $template; ?>
  </div>
  <br class="clearfix" />
</div>
<br class="clearfix" />
<!-- Footer -->
<?php include "footer.php"; ?>
</body>
</html>