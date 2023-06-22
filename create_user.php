<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form Page</title>
</head>

<body>


    <?php
include_once('./navbar.php');

if (!isset($_SESSION['admin_username'])) {
    header('Location:index.php');
}

$name = '';
$email_error = '';
$confirmPass = '';
$pass = '';
$emailPattern = '';
$old_name = '';
$old_email = '';


if (isset($_GET) && !empty($_GET)){
  // var_dump($_GET);
  $errors = json_decode($_GET["errors"], 1);

  if (in_array('name', array_flip($errors))) {
    $name = $errors["name"];
  }

  if (in_array('email', array_flip($errors))) {
    $email_error = $errors["email"];
  }

  if (in_array('confirmPass', array_flip($errors))) {
    $confirmPass = $errors["confirmPass"];
  }

  if (in_array('pass', array_flip($errors))) {
    $pass = $errors["pass"];
  }

  if (in_array('emailPattern', array_flip($errors))) {
    $emailPattern = $errors["emailPattern"];
  }

  if (isset($_GET['old'])) {
    $old_data = json_decode($_GET['old'], 1);

    if (isset($old_data['name'])) {
        $old_name = $old_data['name'];
  }
  if (isset($old_data['email'])) {
    $old_email = $old_data['email'];
}
}
}
?>

    <div class="container my-5 add-form" style="width:50%; border: 1px solid blue; padding: 15px; border-radius: 7px;">
        <form method="POST" id="userForm" action="./save_user.php" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $old_name; ?>">
                <span class="text-danger"><?php echo $name; ?></span>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $old_email; ?>">
                <span class="text-danger"><?php echo $email_error; ?></span>
                <span class="text-danger"><?php echo $emailPattern; ?></span>
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" class="form-control" id="myInput" name="password">
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Show Password
                    </label>
                </div>
                <span class="text-danger"><?php echo $pass; ?></span>
            </div>
            <div class="col-md-6">
                <label for="conPass" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="myInput2" name="conPass">
                <span class="text-danger"><?php echo $confirmPass; ?></span>
            </div>
            <div class="col-md-3">
                <label for="room" class="form-label">Room No.:</label>
                <input type="number" class="form-control" id="room" name="room">
            </div>
            <div class="col-md-3">
                <label for="ext" class="form-label">Ext:</label>
                <input type="number" class="form-control" id="ext" name="ext">
            </div>
            <div class="col-md-6">
                <label for="pic" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="pic" name="file">
            </div>
            <div class="col-md-8">
                <input type='submit' name="submit" value="Add User" class='btn btn-primary form-control'>
            </div>
            <div class="col-md-4">
                <button type="button" onClick="resetFunc()" class='btn btn-warning form-control'>Reset</button>
            </div>
        </form>
    </div>

    <script>
    function resetFunc() {
        document.getElementById("userForm").reset();
    }

    function myFunction() {
        var x = document.getElementById("myInput");
        var y = document.getElementById("myInput2");
        if (x.type && y.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
    </script>
</body>

</html>