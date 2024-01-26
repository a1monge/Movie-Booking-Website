<?php
header('Access-Control-Allow-Origin: *');
// Connect to the database
$host = "localhost";
$user = "Alex";
$password = "mypassword";
$dbname = "world";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a movie id is specified in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Get the details of the specified movie from the database
    $sql = "SELECT * FROM movies WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $picture_url = $row['picture_url'];
        $description = $row['description'];
        $ratings = $row['ratings'];
        $primary_cast = $row['primary_cast'];
    } else {
        // If movie is not found, redirect to homepage
        header("Location: catalogue.html");
        exit();
    }
} else {
    // If movie id is not specified, redirect to homepage
    header("Location: catalogue.html");
    exit();
}

// Close database connection
mysqli_close($conn);
?>

<style>
		input[type="nextPage"],
				button {
					background-color: #4CAF50;
					color: white;
					padding: 14px 20px;
					margin: 8px 0;
					border: none;
					border-radius: 4px;
					cursor: pointer;
					width: 100%;
					transition: background-color 0.3s ease;
				}
		.toolbar {
					display: flex;
					justify-content: space-between;
					align-items: center;
					padding: 10px;
					background-color: #eee;
				}

		.toolbar .logo {
			font-size: 24px;
			font-weight: bold;
		}

		.search {
			display: flex;
			align-items: center;
			margin-right: 20px;
		}

		.search input[type="text"] {
			width: 200px;
			padding: 10px;
			border: none;
			border-radius: 4px;
			margin-right: 10px;
		}

		.search button {
			background-color: #4CAF50;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.search button:hover {
			background-color: #45a049;
		}

		.toolbar button.logout {
			background-color: red;
			color: white;
			border: none;
			padding: 10px 20px;
			border-radius: 4px;
			cursor: pointer;
			margin-right: 20px;
			width: 100px;
			transition: background-color 0.3s ease;
		}

		.toolbar button.logout:hover {
			background-color: darkred;
		}

		@media screen and (max-width: 1200px) {
			.movie {
				width: calc(50% - 20px);
			}
		}

		@media screen and (max-width: 768px) {
			.movie {
				width: 100%;
			}
		}
	</style>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?> - Movie Details</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="toolbar">
		<button class="logout">Log Out</button>
		<button type="nextPage" onclick="location.href='catalogue2.html';">See All Movies</button>
	</div>
	<div class="movie-details">
		<div class="movie-image">
			<img src="<?php echo $picture_url; ?>" alt="<?php echo $title; ?>">
		</div>
		<div class="movie-info">
			<h2><?php echo $title; ?></h2>
			<p class="ratings">Ratings: <?php echo $ratings; ?></p>
			<p class="primary-cast">Primary Cast: <?php echo $primary_cast; ?></p>
			<p class="description"><?php echo $description; ?></p>
		</div>
	</div>
</body>
</html>
