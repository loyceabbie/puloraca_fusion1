<?php
$servername = "localhost"; 
$username = "amk1004803";     
$password = "zW2EZ8dp";     
$dbname = "wp_amk1004803";       

// Create a database connection
$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: {$connection->connect_error}");
}
// Remove the echo "Connected Successfully"; - it's not needed
// Remove the $connection->close(); - we want to keep the connection open
?>