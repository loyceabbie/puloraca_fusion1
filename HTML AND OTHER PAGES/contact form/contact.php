<?php
$host = "localhost"; // Replace with your MySQL server hostname
$username = "root";     // Replace with your MySQL username
$password = "";     // Replace with your MySQL password
$dbname = "puloraca_fusion";       // Replace with the name of your MySQL database

// Create a database connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get user data

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

//insert into database
$sql = "INSERT INTO users (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

// Execute the SQL query using the database connection

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO users (name, email, number, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $email, $number, $message);

if ($stmt->execute()) {
    echo "New record added successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>