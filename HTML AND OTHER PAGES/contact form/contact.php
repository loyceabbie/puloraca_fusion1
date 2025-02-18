<?php
$con=mysqli_connect('localhost','root'); //checking the connection with the database.

if($con){
    echo "Connection Successful";
}

else {
    echo "Connection Failed";
}

 mysqli_select_db($con,'puloraca_fusion'); //connecting with the table created in the database

$name = $_POST['Name'];
$email = $_POST['Email'];
$number = $_POST['Contact number'];
$message = $_POST['Message'];

$query = "INSERT INTO contact(Name, Email, Contact number, Message) VALUES('$name', '$email', '$number', '$message')";//inserting information of the submitted form to the database table


