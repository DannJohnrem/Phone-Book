<?php

require 'conn.php';


//create to database

if (isset($_POST['save'])) {

	$contact_name = $_POST['contact_name'];
	$relationship = $_POST['relationship'];
	$contact_type = $_POST['contact_type'];
	$contact_num = $_POST['contact_num'];
	$service_providers = $_POST['service_providers'];
	$email_add = $_POST['email_add'];
	

	

	$insert1 = $conn->query("INSERT INTO contact_info (contact_name, relationship, contact_type) VALUES('$contact_name', '$relationship', '$contact_type')") or die($insert1->error);


	if ($insert1 === true) {
		$id = $conn->insert_id;
		$insert2 = $conn->query("INSERT INTO caller_table (contact_num, service_providers, ci_num) VALUES ('$contact_num', '$service_providers', '$id')");

		if ($insert2 === true) {

			$insert3 = $conn->query("INSERT INTO email_table (email_add, ci_id) VALUES ('$email_add', '$id')");
		}

		if ($insert3 === true) {

			$_SESSION['message'] = "Record has been created";
			$_SESSION['msg_type'] = "success";
			header('location: index.php');
			
		} else 

			echo "failed to create record";
		}
	}

?>
