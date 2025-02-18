<?php
include 'db_config.php';

$sql = "SELECT * FROM customer_feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head><title>Customer Feedback</title></head>
<body>
    <h1>Customer Feedback</h1>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row["name"] . ":</strong> " . $row["message"] . "</p>";
        }
    } else {
        echo "No feedback yet.";
    }
    ?>
</body>
</html>
