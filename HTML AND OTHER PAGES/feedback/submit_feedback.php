<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// First, let's verify the database connection
try {
    require 'db_config.php';
    echo "Database connection successful!<br>";
} catch (Exception $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Let's verify the table exists
$table_check = $connection->query("SHOW TABLES LIKE 'customer_feedback'");
if ($table_check->num_rows == 0) {
    die("The customer_feedback table doesn't exist!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Debug: Print the received data
    echo "Received POST data:<br>";
    echo "Name: " . htmlspecialchars($_POST['name'] ?? 'not set') . "<br>";
    echo "Feedback: " . htmlspecialchars($_POST['message'] ?? 'not set') . "<br>";

    $name = trim($_POST['name'] ?? '');
    $feedback = trim($_POST['message'] ?? '');

    if (empty($name) || empty($feedback)) {
        echo "Error: Both name and feedback are required.<br>";
    } else {
        try {
            $query = "INSERT INTO customer_feedback (name, feedback) VALUES (?, ?)";
            $stmt = $connection->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Prepare failed: " . $connection->error);
            }
            
            $stmt->bind_param("ss", $name, $feedback);
            
            if ($stmt->execute()) {
                echo "Success! Feedback Received! 😀.<br>";
                // Check if any rows were actually inserted
                if ($stmt->affected_rows > 0) {
                    echo "Inserted " . $stmt->affected_rows . " row(s).<br>";
                } else {
                    echo "Warning: No rows were inserted.<br>";
                }
            } else {
                throw new Exception("Execute failed: " . $stmt->error);
            }
            
            $stmt->close();
        } catch (Exception $e) {
            echo "Database error: " . $e->getMessage() . "<br>";
        }
    }
}
?>