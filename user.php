<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"  href="css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet"  href="css_bootstrap/bootstrap.css">
</head>
<body>
<?php
session_start();

$username = $_SESSION["username"];
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Products</a>
        </li>
      </ul>
      <form class="d-flex">
      <a href="logout.php" class="btn btn-danger" style=" text-decoration: none; font-weight: bold;  text-align: center; border: 3px solid black;">Logout</a>
      &nbsp;&nbsp;
        <img src="./images/social.jpg" style="width: 50px; height:50px; border-radius:5px;">&nbsp;&nbsp;&nbsp;
        <h6 style="margin-top:15px;"><?php echo $username ?></h6>
      </form>
    </div>
  </div>
</nav>

<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-md-9">
    <div class="card-group">
  <div class="card mx-1 rounded">
    <img src="./images/social.jpg" class="card-img-top rounded" alt="..." height="100%">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
    </div>
  </div>
  <div class="card mx-1 border rounded">
    <img src="./images/social.jpg" class="card-img-top rounded" alt="..." height="100%">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
    </div>
  </div>
  <div class="card mx-1 border rounded">
    <img src="./images/social.jpg" class="card-img-top rounded" alt="..." height="100%">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
    </div>
  </div>
  <div class="card mx-1 border rounded">
    <img src="./images/social.jpg" class="card-img-top rounded" alt="..." height="100%">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
    </div>
  </div>
</div>
    </div>
    <div class="col-6 col-md-3">
        <div style="border: 1px solid black; padding:10px; border-radius:7px;">
            <p style="text-align:center;">Tea&nbsp;&nbsp;<span class="btn btn-success">+</span>&nbsp;&nbsp;<span>EGP   </span>&nbsp;&nbsp;<span class="btn btn-warning">-</span></p>
            <p>Tea</p>
        </div>
    </div>
  </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>