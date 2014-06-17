<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = "";
 
if (isset($_POST['payment_id'], $_POST['payment_date'], $_POST['bank'], $_POST['reason'], $_POST['price'], $_POST['sender'], $_POST['details'])) {
	// Sanitize and validate the data passed in
    $payment_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'payment_id', FILTER_SANITIZE_STRING));
    $payment_date = $mysqli->real_escape_string(filter_input(INPUT_POST, 'payment_date', FILTER_SANITIZE_STRING));
    $bank = $mysqli->real_escape_string(filter_input(INPUT_POST, 'bank', FILTER_SANITIZE_STRING));
    $reason = $mysqli->real_escape_string(filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING));
    $price = $mysqli->real_escape_string(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT));
    $sender = $mysqli->real_escape_string(filter_input(INPUT_POST, 'sender', FILTER_SANITIZE_STRING));
    $details = $mysqli->real_escape_string(filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING));
    $member_id = $mysqli->real_escape_string($_SESSION['user_id']); 
	
	$status = "'N'";
	$stmt = $mysqli->prepare('SELECT id FROM payments where id = '.$payment_id.' LIMIT 1'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows < 1){
			header('Location: ./index.php?action=edit_payment&status=invalid');
			$error_msg = "Database error.";
		}
	}
	else {
        header('Location: ./index.php?action=edit_payment&status=error');
		$error_msg = "Database error.";
    }	
	
	$status = 'N';
	if (empty($error_msg)) {		    
  	  if ($update_stmt = $mysqli->prepare("UPDATE payments SET payment_date = ?, bank = ?, reason = ?, price = ?, sender = ?, details = ?, status = ? WHERE id = ?")) {
 	 		$update_stmt->bind_param('ssssssss', $payment_date, $bank, $reason, $price, $sender, $details, $status, $payment_id );
		if (! $update_stmt->execute()) {
			header('Location: ./index.php?action=edit_payment&status=error');
   	  	}
 	}
	header('Location: ./index.php?action=payments&status=update_success');   
	}
}