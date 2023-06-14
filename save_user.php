<?php
include './operations.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$conPass = $_POST['conPass'];
$room_no = $_POST['room'];
$ext = $_POST['ext'];
$file_info= $_FILES['file'];
$file_name = $file_info['name'];
$tmp_name = $file_info['tmp_name'];


$errors = [];
if (isset($name) && empty($name)) {
    $errors['name'] = "Name is required";
}

if (isset($email) && empty($email)) {
    $errors['email'] = "Email is required";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['emailPattern'] = " Invalid email format";
}

if(!preg_match('/(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[$@$!%*?&])/', $password) && strlen($_POST["password"]) <= '8') {
    $errors['pass'] = "Min length should be 8 and must include at least 1 uppercase, 1 lowercase and 1 special character";
}

if ($password !== $conPass) {
    $errors['confirmPass'] = "Password doesn't match";
}


if(isset($_POST['submit'])) {
    if (count($errors)) {
        $stringErrors = json_encode($errors);
        $url = "Location:create_user.php?errors={$stringErrors}";
        header($url);
    } else {
    $new_user = insert($name, $email, $password, $room_no, $ext, "<img src='$file_name' width='100px' height='100px' style='border-radius:7px'>");
header('Location:./data_table.php');
    } 
    }

    try {
        $res = move_uploaded_file($tmp_name, $file_name);
    } catch (Exception $e) {
        echo $e;
    }
?>