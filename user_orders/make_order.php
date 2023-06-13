<?php


session_start();

include '../db_connection.php';
include '../connection_credentials.php';

$username = $_SESSION["username"];

$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);
$insert_query = "insert into `restaurant`.`orders` (`userId`, `productId`, `orderDate`, `qty`) 
                 values (1, ?, '" . date("Y-m-d H:i:s") . "' , ? );
                 ";

$stmt = $db->prepare($insert_query);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        foreach ($_POST["orders"] as $id => $qty) {
            $stmt->execute([$id, $qty]);
        }

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
