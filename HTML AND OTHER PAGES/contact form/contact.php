<?php
$servername = "localhost"; 
$username = "amk1004803";     
$password = "zW2EZ8dp";     
$dbname = "wp_amk1004803";       

// Create a database connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//get user data

$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];

//insert into database
$sql = "INSERT INTO contact (name, email, number, message) VALUES ('$name', '$email', '$number', '$message')";

// Execute the SQL query using the database connection

// Use prepared statements to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO contact (name, email, number, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssis", $name, $email, $number, $message);

if ($stmt->execute()) {
    // Redirect to home page after successful form submission
    header("Location: index.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$connection->close();
?>