<?php
// db_config.php
$host = "localhost";
$user = "root";
$password = "Peasy@123";
$dbname = "puloraca_fdb";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
