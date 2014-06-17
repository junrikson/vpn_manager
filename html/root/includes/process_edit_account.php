<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = ""; 
if (isset($_POST['username'], $_POST['password'], $_POST['member_id'], $_POST['expired'], $_POST['hwid'], $_POST['details'], $_POST['status'], $_POST['id'])) {
	// Sanitize and validate the data passed in	
	$username = $mysqli->real_escape_string(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
	$password = $mysqli->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
	$member_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'member_id', FILTER_SANITIZE_STRING));
	$expired = $mysqli->real_escape_string(filter_input(INPUT_POST, 'expired', FILTER_SANITIZE_STRING));
	$hwid = $mysqli->real_escape_string(filter_input(INPUT_POST, 'hwid', FILTER_SANITIZE_STRING));
	$details = $mysqli->real_escape_string(filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING));
	$status = $mysqli->real_escape_string(filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING));
	$id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
		
	if (empty($error_msg)) {		    
  	  if ($update_stmt = $mysqli->prepare("UPDATE accounts SET username = ?, password = ?, member_id = ?, expired = ?, hwid = ?, details = ?, status = ? WHERE id = ?")) {
 	 		$update_stmt->bind_param('ssssssss', $username, $password, $member_id, $expired, $hwid, $details, $status, $id );
		if (! $update_stmt->execute()) {
			header('Location: ./index.php?action=viewaccounts&status=error');
   	  	}
 	}
	header('Location: ./index.php?action=viewaccounts&status=command_success');   
	}
}	