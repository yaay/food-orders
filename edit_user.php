<?php
session_start(); 

include_once('./navbar.php');
include './operations.php';

if (!isset($_SESSION['admin_username'])) {
    header('Location:index.php');
  }

$user = select_user_by_id($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form Page</title>
</head>

<body>
    <div class="container my-5" style="width:50%; border: 1px solid blue; padding: 15px; border-radius: 7px;">
        <form method="POST" action="./update_user.php?id=<?php echo $user["ID"] ?>" enctype="multipart/form-data"
            class="row g-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo $user["name"] ? $user["name"] : '';?>">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo $user["email"] ? $user["email"] : '';?>">
            </div>
            <div class="col-md-6">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" class="form-control" id="myInput" name="password" required>
                <div class="form-check mt-2">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Show Password
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <label for="conPass" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="myInput2" name="conPass" required>
            </div>
            <div class="col-md-3">
                <label for="room" class="form-label">Room No.:</label>
                <input type="number" class="form-control" id="room" name="room"
                    value="<?php echo $user["room_no"] ? $user["room_no"] : '';?>">
            </div>
            <div class="col-md-3">
                <label for="ext" class="form-label">Ext:</label>
                <input type="number" class="form-control" id="ext" name="ext"
                    value="<?php echo $user["ext"] ? $user["ext"] : '';?>">
            </div>
            <div class="col-md-6">
                <label for="pic" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="pic" name="file">
            </div>
            <div class="col-md-12">
                <input type='submit' name="update" value="Update" class='btn btn-success form-control'>
            </div>
        </form>
    </div>

    <script>
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