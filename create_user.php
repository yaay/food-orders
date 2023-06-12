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
?>

  <div class="container my-5" style="width:50%;">
<form method="POST" id="userForm" action="./save_user.php" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Name:</label>
    <input type="text" class="form-control" id="name" aria-describedby="name" name="name">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email:</label>
    <input type="email" class="form-control" id="email" aria-describedby="email" name="email">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password:</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <div class="mb-3">
    <label for="conPass" class="form-label">Confirm Password:</label>
    <input type="password" class="form-control" id="conPass" name="conPass">
  </div>
  <div class="mb-3">
    <label for="room" class="form-label">Room No.:</label>
    <input type="number" class="form-control" id="room" aria-describedby="room" name="room">
  </div>

  <div class="mb-3">
    <label for="ext" class="form-label">Ext:</label>
    <input type="number" class="form-control" id="ext" aria-describedby="ext" name="ext">
  </div>
  <div class="mb-3">
    <label for="pic" class="form-label">Profile Picture:</label>
    <input type="file" class="form-control" id="pic" name="file">
  </div>
  <input type='submit' name="submit" value="Add" class='btn btn-primary'>
<button type="button" onClick="resetFunc()" class='btn btn-warning'>Reset</button>
</form>
</div>

<script>
  function resetFunc() {
  document.getElementById("userForm").reset();
}
</script>
  </body>
</html>