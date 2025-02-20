<?php
include 'db_config.php';

$sql = "SELECT * FROM customer_feedback";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["name"] . ":</strong> " . $row["message"] . 
             " <a href='edit_feedback.php?id=" . $row["id"] . "'>Edit</a> | 
               <a href='delete_feedback.php?id=" . $row["id"] . "'>Delete</a></p>";
    }
} else {
    echo "No feedback yet.";
}
?>
