<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>foodOrder</title>
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css_bootstrap/bootstrap.css">
</head>

<body>

    <?php
session_start();

include './db_connection.php';
include './connection_credentials.php';
$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);

function get_admin($admin_email) {
  global $db;
$sql = $db->query("SELECT * FROM `restaurant`.`users` where email = '$admin_email'");
return $sql->fetch();
}

  if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (isset($username) && empty($username)) {
      $username_error = "Username is required";

  } else {
    $old_username = $username;
  }

    if (isset($email) && empty($email)) {
      $emai_error = "Email is required";

  } else {
    $old_email = $email;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email_patt = " Invalid email format";
}

if(!preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@$!%*?&])/', $password) && strlen($_POST["password"]) <= '8') {
  $pass_error = "Min length should be 8 and must include at least 1 uppercase, 1 lowercase and 1 special character";
}

    $admin = get_admin($_POST['email']);
    // echo "<pre>";
    // var_dump($admin);
    // echo "</pre>";

    if ($admin && password_verify($password, $admin['password'])) {
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
    <div class="myForm">
        <p class="cafeteria">Cafeteria</p>
        <form class="div-form border border-primary rounded" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>

                <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" value="<?php echo $old_username ??'' ; ?>">
                <span class="text-danger"><?php echo $username_error ??'' ; ?></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address:</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"

                    name="email" value="<?php echo $old_email ??'' ; ?>">
                    <span class="text-danger"><?php echo $emai_error ??'' ; ?></span>
                    <span class="text-danger"><?php echo $email_patt ??'' ; ?></span>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                <span class="text-danger"><?php echo $pass_error ??'' ; ?></span>
            </div>
            <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
        </form>
    </div>

</body>

</html>