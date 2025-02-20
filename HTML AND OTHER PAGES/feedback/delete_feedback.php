<?php
include 'db_config.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM customer_feedback WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "Feedback deleted!";
    }
}
?>

