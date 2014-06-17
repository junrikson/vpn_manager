<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = "";
 
if (isset($_POST['payment_date'], $_POST['bank'], $_POST['reason'], $_POST['price'], $_POST['sender'], $_POST['details'])) {
	// Sanitize and validate the data passed in
    $payment_date = $mysqli->real_escape_string(filter_input(INPUT_POST, 'payment_date', FILTER_SANITIZE_STRING));
    $bank = $mysqli->real_escape_string(filter_input(INPUT_POST, 'bank', FILTER_SANITIZE_STRING));
    $reason = $mysqli->real_escape_string(filter_input(INPUT_POST, 'reason', FILTER_SANITIZE_STRING));
    $price = $mysqli->real_escape_string(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_FLOAT));
    $sender = $mysqli->real_escape_string(filter_input(INPUT_POST, 'sender', FILTER_SANITIZE_STRING));
    $details = $mysqli->real_escape_string(filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING));
    $member_id = $mysqli->real_escape_string($_SESSION['user_id']);    
	
	$status = 'N';
	if (empty($error_msg)) {			    
  	  if ($insert_stmt = $mysqli->prepare("INSERT INTO payments (member_id, payment_date, bank, reason, price, sender, details, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
 	 		$insert_stmt->bind_param('ssssssss', $member_id, $payment_date, $bank, $reason, $price, $sender, $details, $status);
		if (! $insert_stmt->execute()) {
			header('Location: ./clientarea.php?action=payments&status=error'); 
   	  	}
		else{
			if($reason == "buy_from_product"){
				$status2 = "'N'";
				$stmt = $mysqli->prepare('SELECT id FROM payments where (member_id = '.$member_id.' and status = '.$status2.') order by id desc LIMIT 1'); 	
				if ($stmt) {
					$stmt->execute();
					$stmt->bind_result($temp);
					while ($stmt->fetch()) {
						$payment_id = $temp;
    				}
					$status = 'Y';
					$status2 = 'N';	
					if ($update_stmt = $mysqli->prepare("UPDATE invoices SET payment_id = ?, status = ? WHERE ((member_id = ?) and (status = ?))")) {
 						$update_stmt->bind_param('ssss', $payment_id, $status, $member_id, $status2);
						if (! $update_stmt->execute()) {
							header('Location: ./clientarea.php?action=payments&status=error');
   						}
 					}							
				}
				else {
        			header('Location: ./clientarea.php?action=payments&status=error');
					$error_msg = "Database error.";
    			}								
			}
		}
 	}	
	header('Location: ./clientarea.php?action=payments&status=success');   
	}
}