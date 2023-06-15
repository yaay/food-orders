<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet"  href="css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet"  href="css_bootstrap/bootstrap.css">
</head>
<body>
<?php
session_start();

// $admin_email = $_SESSION["admin_email"];
$admin_username = $_SESSION["admin_username"];
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="./admin.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./admin_show_products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./data_table.php">Users</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./user_orders/user.php">Manual Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./checks.php">Checks</a>
        </li>
      </ul>
      <form class="d-flex">
       <a href="logout.php" class="btn btn-danger" style=" text-decoration: none; font-weight: bold;  text-align: center; border: 3px solid black;">Logout</a>
       &nbsp;&nbsp;
        <img src="./images/user.jpg" style="width: 50px; height:50px; border-radius:5px;">
        &nbsp;&nbsp;&nbsp;
        <h6 style="margin-top:15px;"><?php echo $admin_username ?></h6>
      </form>
    </div>
  </div>
</nav>

<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> -->
</body>
</html>