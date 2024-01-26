<?php
header('Access-Control-Allow-Origin: *');
// Get the user data from the AJAX request
$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

// Connect to the MySQL database

$conn = new mysqli("localhost", "Alex", "mypassword", "world");

// Check for errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert the data into the database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if (mysqli_query($conn, $sql)) {
  echo "Signup successful!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the MySQL connection
$conn->close();
?>