<?php
$servername = "localhost"; 
$username = "amk1004803";     
$password = "zW2EZ8dp";     
$dbname = "wp_amk1004803";       

// Create a database connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>