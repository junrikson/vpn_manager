<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = ""; 
if (isset($_POST['username'], $_POST['email'], $_POST['status'], $_POST['reff_id'], $_POST['ratio'], $_POST['reff_ratio'], $_POST['id'])) {
	// Sanitize and validate the data passed in	
	$username = $mysqli->real_escape_string(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	$email = $mysqli->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
	$status = $mysqli->real_escape_string(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING));
	$reff_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'reff_id', FILTER_SANITIZE_STRING));
	$ratio = $mysqli->real_escape_string(filter_input(INPUT_POST, 'ratio', FILTER_SANITIZE_STRING));
	$reff_ratio = $mysqli->real_escape_string(filter_input(INPUT_POST, 'reff_ratio', FILTER_SANITIZE_STRING));
	$id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
		
	if (empty($error_msg)) {		    
  	  if ($update_stmt = $mysqli->prepare("UPDATE members SET username = ?, email = ?, status = ?, reff_id = ?, ratio = ?, reff_ratio = ? WHERE id = ?")) {
 	 		$update_stmt->bind_param('sssssss', $username, $email, $status, $reff_id, $ratio, $reff_ratio, $id );
		if (! $update_stmt->execute()) {
			header('Location: ./index.php?action=viewmembers&status=error');
   	  	}
 	}
	header('Location: ./index.php?action=viewmembers&status=command_success');   
	}
}	