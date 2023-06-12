<?php

include_once('./navbar.php');
include './operations.php';

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
    <div class="container my-5" style="width:50%;">
        <form method="POST" action="./update_user.php?id=<?php echo $user["ID"] ?>" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" aria-describedby="name" name="name"
                    value="<?php echo $user["name"] ? $user["name"] : '';?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" aria-describedby="email" name="email"
                    value="<?php echo $user["email"] ? $user["email"] : '';?>">

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password:</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
            </div>
            <div class="mb-3">
                <label for="conPass" class="form-label">Confirm Password:</label>
                <input type="password" class="form-control" id="conPass" name="conPass" required>
            </div>
            <div class="mb-3">
                <label for="room" class="form-label">Room No.:</label>
                <input type="number" class="form-control" id="room" aria-describedby="room" name="room"
                    value="<?php echo $user["room_no"] ? $user["room_no"] : '';?>">
            </div>

            <div class="mb-3">
                <label for="ext" class="form-label">Ext:</label>
                <input type="number" class="form-control" id="ext" aria-describedby="ext" name="ext"
                    value="<?php echo $user["ext"] ? $user["ext"] : '';?>">
            </div>
            <div class="mb-3">
                <label for="pic" class="form-label">Profile Picture:</label>
                <input type="file" class="form-control" id="pic" name="file">
            </div>
            <input type='submit' name="update" value="Update" class='btn btn-success form-control'>
        </form>
    </div>
</body>
</html>