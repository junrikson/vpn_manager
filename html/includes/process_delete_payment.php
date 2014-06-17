<?php
if(!defined('MyConst')) {
   die('Go Away!');
} 
include_once 'db_connect.php';
$error_msg = "";

if (isset($_POST['payment_id'])) {
	// Sanitize and validate the data passed in
    $member_id = $mysqli->real_escape_string($_SESSION['user_id']);
    $payment_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_STRING));
    
	$status = "'N'";
	$stmt = $mysqli->prepare('SELECT id FROM payments where (id = '.$payment_id.' and member_id = '.$member_id.' and status = '.$status.') LIMIT 1'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows < 1){
			header('Location: ./clientarea.php?action=delete_payment&status=invalid');
			$error_msg = "Database error.";
		}
	}
	else {
        header('Location: ./clientarea.php?action=delete_payment&status=error');
		$error_msg = "Database error.";
    }	
		
	if (empty($error_msg)) {	    
  	  if ($update_stmt = $mysqli->prepare("DELETE FROM payments WHERE ((id = ?) and (member_id = ?))")) {
 	 		$update_stmt->bind_param('ss', $payment_id, $member_id);
		if (! $update_stmt->execute()) {
			header('Location: ./clientarea.php?action=delete_payment&status=error');
   	  	}
 	}
	header('Location: ./clientarea.php?action=payments&status=delete_success');   
	}
}