<?php


// Database credentials
$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'restaurant';

// Create a connection
$conn = mysqli_connect($host,$username,$password,$dbName);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>