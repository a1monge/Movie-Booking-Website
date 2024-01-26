<?php
// Connect to MySQL database
header('Access-Control-Allow-Origin: *');
$conn = new mysqli("localhost", "Alex", "mypassword", "world");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$time = $_POST['time'];
$theater = $_POST['theater'];
$seats = $_POST['seats'];
$tickets = $_POST['tickets'];
$ticket_num = intval($tickets); // convert to integer
$seats_num = intval($seats); // convert to integer

// Generate random code
for ($i = 0; $i < $ticket_num; $i++) {
    $k = $i + 1;
    $code = "";
    $characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $length = 10;
    for ($j = 0; $j < $length; $j++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    // Insert ticket information into table
    $sql = "INSERT INTO tickets (time, theater, seats, code) VALUES ('$time', '$theater', '$seats', '$code')";

    if (mysqli_query($conn, $sql)) {
        echo "Ticket " . $k. ". " . $code . "<br>";
    } else {
        echo "Error:  " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close database connection
mysqli_close($conn);
?>