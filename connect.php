<?php
//session_start();
$servername = "localhost";
$username = "root";
$password = "hellomysql";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$_SESSION['conn'] = $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>