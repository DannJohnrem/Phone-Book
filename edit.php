<?php 

require 'conn.php';

$id = 0;
$update = false;
$contact_name = '';
$relationship = '';
$contact_type = '';
$contact_num = '';
$service_providers = '';
$user_name = '';
$email_domain = '';

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];

	$update = true;

	$result = $conn->query("SELECT * FROM vw_pb WHERE id=$id");

	if ($result->num_rows) {
		$row = $result->fetch_array();
		$contact_name = $row['contact_name'];
		$relationship = $row['relationship'];
		$contact_type = $row['contact_type'];
		$contact_num = $row['contact_num'];
		$service_providers = $row['service_providers'];
		$email_add = $row['email_add'];
		
	}
}

if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$contact_name = $_POST['contact_name'];
	$relationship = $_POST['relationship'];
	$contact_type = $_POST['contact_type'];
	$contact_num = $_POST['contact_num'];
	$service_providers = $_POST['service_providers'];
	$email_add = $_POST['email_add'];


	$update1 = $conn->query("UPDATE contact_info SET contact_name='$contact_name', relationship='$relationship', contact_type='$contact_type' WHERE id=$id") or die($conn->error);

	if ($update1 === true) {
		$update2 = $conn->query("UPDATE caller_table SET contact_num='$contact_num', service_providers='$service_providers' WHERE id=$id") or die($conn->error);
	}
		if ($update2 === true) {
			$update3 = $conn->query("UPDATE email_table SET email_add='email_add' WHERE id=$id") or die($conn->error);
		}
			if ($update3 === true) {
				$_SESSION['message'] = "Record is successfully updated";
				$_SESSION['msg_type'] = "warning";
				header('location: index.php');
			}

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Phone Book</title>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>

<body>

		<div class="row justify-content-center">
			<div class="col-8">
				<form action="edit.php" method="POST">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="contact_name">Contact Name: </label>
							<input type="text" name="contact_name" class="form-control" value="<?php echo $contact_name; ?>" placeholder="Enter your contact name">
						</div>
						<div class="form-group col-md-6">
							<label for="relationship">Relationship: </label>
							<input type="text" name="relationship" class="form-control" value="<?php echo $relationship; ?>" placeholder="e.g relatives, co-worker, etc.">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-10">
							<label for="contact_type">Contact Type: </label>
							<select id="contact_type" name="contact_type" class="custom-select">
								<option value="<?php echo $contact_type; ?>"><?php echo $contact_type; ?></option>
								<option value="<?php echo $contact_type; ?>"></option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="contact_num">Contact Number: </label>
							<input type="text" name="contact_num" class="form-control" value="<?php echo $contact_num; ?>" placeholder="Enter your Contact Number" maxlength="11">
						</div>
						<div class="form-group col-md-6">
							<label for="service_providers">Service Providers: </label>
							<input type="text" name="service_providers" class="form-control" value="<?php echo $service_providers; ?>" placeholder="Enter your Service Providers" maxlength="11">
						</div>
						<div class="form-group col-md-6">
							<label for="email_add">Email Address: </label>
							<input type="text" name="email_add" class="form-control" placeholder="Enter your Email Address">
						</div>
						<!-- <div class="form-group col-md-6">
							<label for="email_domain">Email Domain: </label>
							<input type="text" name="email_domain" class="form-control" value="<?php echo $email_domain;?>" placeholder="Enter your Email Domain">
						</div> -->
					</div>
					<div class="row offset-10">
						<div class="form-group">
							<?php
								if ($update == true) :
							?>
							<button type="submit" class="btn btn-info" name="update">UPDATE</button>
							<?php
								endif
							?>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

