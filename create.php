<?php
	
	require_once "conn.php";
	
	//create to database

	if (isset($_POST['save'])) {
		$contact_name = $_POST['contact_name'];
		$relationship = $_POST['relationship'];
		$contact_type = $_POST['contact_type'];
		// $contact_num = $_POST['contact_num'];
		// $service_providers = $_POST['service_providers'];
		// $user_name = $_POST['user_name'];
		// $email_domain = $_POST['email_domain'];
		// $email_add = $_POST['email_add'];

		$sql = "INSERT INTO `contact_info` (`contact_name`, `relationship`, `contact_type`) VALUES(`$contact_name`, `$relationship`, `$contact_type`)";

		// $sql = "INSERT INTO `caller_table` (`contact_num`, `service_providers`) VALUES (`$contact_num`, `$service_providers`)";


		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		  } else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		  }
		// header('location:index.php');
		// $conn->query("INSERT INTO `email_table` (`user_name`, `email_domain`) VALUES ('$contact_num', '$service_providers')");

		
		// if ($conn->multi_query($sql) === true) {
		// 	echo "New records created successfully";
		// } else {

		//   echo "Error: " . $sql . "<br>" . $conn->error;
		// }
	}


	// $contact_name = mysqli_real_escape_string($link, $_REQUEST['contact_name']);
	// $relationship = mysqli_real_escape_string($link, $_REQUEST['relationship']);
	// $contact_type = mysqli_real_escape_string($link, $_REQUEST['contact_type']);
	// $contact_type = mysqli_real_escape_string($link, $_REQUEST['contact_num']);
	// $contact_type = mysqli_real_escape_string($link, $_REQUEST['email_add']);

	// $sql = "INSERT INTO persons (contact_name, relationship, contact_type, contact_num, email_add) VALUES ('$first_name', '$last_name', '$email')";
	// if($conn->query($sql) === true){
 //    echo "Records inserted successfully.";
	// } else {
	//     echo "ERROR: Could not able to execute $sql. " . $conn->error;
	// }
?>