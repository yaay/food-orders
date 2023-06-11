<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
.admin-view {
    margin: auto;
    width: 50%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.admin-view a:link {
  font-size:20px;
  font-family:'Courier New', Courier, monospace;
  text-decoration: none;
  font-weight: bold;
}
  </style>
</head>
<body>

    <?php
    include_once './navbar.php';
    ?>

    <div class="admin-view">
    <div class="row row-cols-1 row-cols-md-2 g-4">
      <div class="col">
        <div class="card h-100">
          <img src="./images/user.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <center><a href="./create_user.php">Add User</a></center>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100">
          <img src="./images/food.jpg" class="card-img-top" alt="...">
          <div class="card-body">
          <center><a href="admin_products.php">Add Product</a></center>
          </div>
        </div>
      </div>
    </div>
</div>
</body>
</html>