<?php
include './operations.php';


$id = $_GET['id'];

if ($id ) {
    $res = delete($id);
    header("Location:./data_table.php");
}

?>