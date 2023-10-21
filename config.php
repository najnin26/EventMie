<?php

$host = 'localhost';
$dbname = 'user_db';
$username = 'root';
$password = ''; // If you have set a password for the root user, replace the empty string with your password.

// Create connection
$connection = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

?>