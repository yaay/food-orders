<?php
include './operations.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$conPass = $_POST['conPass'];
$room_no = $_POST['room'];
$ext = $_POST['ext'];
// $profile_picture = $_POST['file'];


$file_info= $_FILES['file'];
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
$file_name = $file_info['name'];
$tmp_name = $file_info['tmp_name'];


try {
    // $res = move_uploaded_file($tmp_name, "images/".$file_name);
    $res = move_uploaded_file($tmp_name, $file_name);
} catch (Exception $e) {
    echo $e;
}

if(isset($_POST['submit'])) {
    if ($password !== $conPass) {
    header("Location:./create_user.php");

    } else {
    
    $new_user = insert($name, $email, $password, $room_no, $ext, "<img src='$file_name' width='100px' height='100px' style='border-radius:7px'>");

// var_dump($new_user);
header('Location:./data_table.php');
    } 
    }
?>