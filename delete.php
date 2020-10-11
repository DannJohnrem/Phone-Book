<?php

require 'conn.php';

if (isset($_GET['delete'])) {
    
    $id = $_GET['delete'];
    $_SESSION['message'] = "Record has been deleted";
	$_SESSION['msg_type'] = "danger";
	
    $conn->query("DELETE FROM contact_info WHERE id=$id") or die($conn->error);
    $conn->query("DELETE FROM caller_table WHERE id=$id") or die($conn->error);
    $conn->query("DELETE FROM email_table WHERE id=$id") or die($conn->error);

    
    header('location: index.php');
}


?>
