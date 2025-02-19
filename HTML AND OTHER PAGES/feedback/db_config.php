<?php
// db_config.php
$DB_HOST = "mysql_container";
$DB_PORT = "88:80";
$DB_DATABASE = "puloraca_fdb";
$DB_USERNAME = "root@172.19.0.3";
$DB_PASSWORD = "Peasy@123";


$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
