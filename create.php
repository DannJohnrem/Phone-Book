<?php

require './conn.php';

//create to database

if (isset($_POST['save'])) {
	$contact_name = $_POST['contact_name'];
	$relationship = $_POST['relationship'];
	$contact_type = $_POST['contact_type'];
	$contact_num = $_POST['contact_num'];
	$service_providers = $_POST['service_providers'];
	$user_name = $_POST['user_name'];
	$email_domain = $_POST['email_domain'];

	$insert1 = $conn->query("INSERT INTO `contact_info` (`contact_name`, `relationship`, `contact_type`) VALUES('$contact_name', '$relationship', '$contact_type')") or die($insert1->error);


	if ($insert1 === true) {
		$id = $conn->insert_id;
		$insert2 = $conn->query("INSERT INTO `caller_table` (`contact_num`, `service_providers`, `ci_num`) VALUES ('$contact_num', '$service_providers', '$id')");

		if ($insert2 === true) {
			$id = $conn->insert_id;
			$insert3 = $conn->query("INSERT INTO `email_table` (`user_name` , `email_domain`, `ci_id`) VALUES ('$user_name', '$email_domain', '$id')");
		}

		if ($insert3 === true) {

			echo "New record created successfully";
		} else {

			echo "failed to create record";
		}
	}
}
