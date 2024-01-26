<?php
$title = "Star Wars";

$conn = new mysqli("localhost", "Alex", "mypassword", "world");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$movieTitle = "The Godfather";
$sql = "INSERT INTO movies (title) VALUES ('$movieTitle')";
if ($conn->query($sql) === TRUE) {
  echo "Movie title inserted successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);