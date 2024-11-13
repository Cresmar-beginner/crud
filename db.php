<?php
// Database connection
$host = 'localhost';
$user = 'cresmar';
$pass = 'cresmar';
$db_name = 'fish_db';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>