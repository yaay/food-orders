<?php

include './operations.php';
$user = select_user_by_id($_GET["id"]);
// var_dump($_GET);
// var_dump($_POST);

$id = $_GET['id'];

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$conPass = $_POST["conPass"];
$room = $_POST["room"];
$ext = $_POST["ext"];

$file_info= $_FILES['file'];
$file_name = $file_info['name'];
$tmp_name = $file_info['tmp_name'];

if(isset($_POST['update'])) {
    if ($password !== $conPass) {
    header("Location:./edit_user.php?id={$user["ID"]}");
    } else {
    $res = update($id, $name, $email, password_hash($password, PASSWORD_DEFAULT), $room, $ext, "<img src='$file_name' width='100px' height='100px' style='border-radius:7px'>");
    header("Location:./data_table.php");
}
}

try {
    $res = move_uploaded_file($tmp_name, $file_name);
} catch (Exception $e) {
    echo $e;
}
?>