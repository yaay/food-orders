<?php

include './db_connection.php';
include './connection_credentials.php';



session_start();
session_unset();
session_destroy();

header('location:index.php');

?>