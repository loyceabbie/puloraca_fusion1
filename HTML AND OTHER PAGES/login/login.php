<?php
session_start();
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Add error checking and debugging
    if (!isset($_POST["username"]) || !isset($_POST["password"])) {
        die("Error: Form fields are missing. Please try again.");
    }
    
    $username = trim($_POST["username"]); // Using trim to remove any whitespace
    $password = trim($_POST["password"]);

    // For debugging (remove in production)
    if (empty($username) || empty($password)) {
        die("Error: Username and password are required.");
    }

    // Check for either username or email
    $stmt = $connection->prepare("SELECT id, username, password FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION["user_id"] = $user['id'];
            $_SESSION["username"] = $user['username'];
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }

    $stmt->close();
    $connection->close();
} else {
    echo "Please submit the form.";
}
?>