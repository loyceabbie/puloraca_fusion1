<<?php
$servername = "localhost"; 
$username = "amk1004803";     
$password = "zW2EZ8dp";     
$dbname = "wp_amk1004803";       

// Create a database connection
$connection = new mysqli($servername, $username, $password, $dbname);

if ($connection->connect_error) {
    die("Connection failed: {$connection->connect_error}");
}
// Set charset to utf8mb4
$connection->set_charset("utf8mb4");

try {
    // Your code here
} catch (Exception $e) {
    die("Connection error: " . $e->getMessage());
}
?>
