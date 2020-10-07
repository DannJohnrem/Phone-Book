<?php 
	

	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "phone_book";

	$conn = new mysqli($servername, $username, $password, $database) or die(mysqli_error($mysqli));

	$result = $conn->query("SELECT * FROM vw_pbk");

	//check connection

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// echo 'Connected successfully';
	

	mysqli_close($conn);
?>
