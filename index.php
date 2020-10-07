
<?php require_once 'conn.php'; ?>

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
	

	<div class="container">

		<?php include 'conn.php'; ?>

			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>Contact Name</th>
							<th>Relationship</th>
							<th>Contact Number</th>
							<th>Email Address</th>
							<th colspan="2">ACTION</th>
						</tr>
					</thead>
				<?php
					while ( $row = $result->fetch_assoc()) {
				?>

					<tr>
						<td><?php echo $row['contact_name']?></td>
						<td><?php echo $row['relationship']?></td>
						<td><?php echo $row['contact_num']?></td>
						<td><?php echo $row['email_add']?></td>
					</tr>
				<?php 
					} 
				?>
				</table>
			</div>

		<div class="row justify-content-center">
			<div class="col-8">
				<form action="create.php" method="POST">
					<div class="row">
						<div class="form-group col-md-6">
							<label for="contact_name">Contact Name: </label>
							<input type="text" name="contact_name" class="form-control" placeholder="Enter your contact name">
						</div>
						<div class="form-group col-md-6">
							<label for="relationship">Relationship: </label>
							<input type="text" name="relationship" class="form-control" placeholder="e.g relatives, co-worker, etc.">
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-10">
							<label for="contact_type">Contact Type: </label>
							<select id="contact_type" name="contact_type" class="custom-select">
							  <option value="0">--Select Contact Types--</option>
							  <option value="home">Home</option>
							  <option value="work">Work</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="form-group col-md-6">
							<label for="contact_num">Contact Number: </label>
							<input type="text" name="contact_num" class="form-control" placeholder="Enter your Contact Number" maxlength="11">
						</div>
						<div class="form-group col-md-6">
							<label for="service_providers">Service Providers: </label>
							<input type="text" name="service_providers" class="form-control" placeholder="Enter your Service Providers" maxlength="11">
						</div>
						<div class="form-group col-md-6">
							<label for="email_add">Email Address: </label>
							<input type="email" name="email_add" class="form-control" placeholder="Enter your Email Address">	
						</div>
					</div>
					<div class="row offset-10">
						<div class="form-group">
							<button type="submit" class="btn btn-primary" name="save">SAVE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
