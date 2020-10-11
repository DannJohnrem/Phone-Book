<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

$servername = "localhost";
$username = "root";
$password = "";
$database = "phone_book";

$conn = new mysqli($servername, $username, $password, $database) or die($conn->connect_error);

//check connection

if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

	// echo 'Connected successfully';

?>
