<?php

header('Access-Control-Allow-Origin: *');
$email = $_POST["email"];
$password = $_POST["password"];

// Connect to the MySQL database
$conn = new mysqli("localhost", "Alex", "mypassword", "world");

// Check for errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "admin";
} else {
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "valid";
    } else {
        echo "invalid";
    }
}

$conn->close();
?>