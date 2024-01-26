<?php

$conn = new mysqli("localhost", "Alex", "mypassword", "world");

// Write SQL query to count tickets and retrieve movie titles
$query = "SELECT COUNT(*) AS ticket_count FROM tickets";
$ticket_result = mysqli_query($conn, $query);
$ticket_count = mysqli_fetch_assoc($ticket_result)['ticket_count'];

$query = "SELECT title FROM movies";
$movie_result = mysqli_query($conn, $query);

// Loop through the movie titles and store them in an array
$movies = array();
while ($row = mysqli_fetch_assoc($movie_result)) {
    $movies[] = $row['title'];
}

// Print out the number of tickets sold and the movie titles
echo "<h2>Ticket Sales Report</h2>";
echo "<p>Number of tickets sold: " . $ticket_count . "</p>";
echo "<p>Movies showing: </p>";
echo "<ul>";
foreach ($movies as $movie) {
    echo "<li>" . $movie . "</li>";
}
echo "</ul>";
?>