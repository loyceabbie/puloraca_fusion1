<?php
include 'db_confid.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $message = $_POST["message"];

    $sql = "INSERT INTO customer_feedback (name, message) VALUES ('$name', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
