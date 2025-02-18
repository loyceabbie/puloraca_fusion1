<?php
include 'db_connect.php';

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM customer_feedback WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback deleted!";
    }
}
?>

