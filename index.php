<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodOrder</title>
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

<?php
session_start();

include './db_connection.php';
include './connection_credentials.php';
$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);


function get_admin($admin_email, $admin_pass) {
  global $db;
$sql = $db->query("SELECT * FROM `restaurant`.`users` where email = '$admin_email' AND password = '$admin_pass'");
return $sql->fetch();
}

  if (isset($_POST['submit'])) {
    $admin = get_admin($_POST['email'], $_POST['password']);
    echo "<pre>";
    var_dump($admin);
    echo "</pre>";

    if (($admin)) {
      if ($admin['isAdmin']) {
        $_SESSION["admin_username"] = $_POST['username'];
        header('Location:admin.php');
      }
      else {
        $_SESSION["username"] = $_POST["username"];
          header('Location:user.php');
      }
    } 
  }
?>
<!-- <div class="container min-vh-100 d-flex justify-content-center align-items-center"> -->
<div class="myForm">
    <p class="cafeteria">Cafeteria</p>
<form class="div-form border border-primary rounded" method="POST">
  <div class="mb-3">
    <label for="username" class="form-label">Username:</label>
    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address:</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
</form>
<br>
<center><a href="forget.php">Forgotten Password</a></center>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>