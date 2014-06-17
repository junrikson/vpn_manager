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
	$member_id = $_SESSION['user_id']; 
	$status = 'Y';
	
	if (empty($error_msg)) {
		if ($insert_stmt = $mysqli->prepare("INSERT INTO payments (member_id, payment_date, bank, reason, price, sender, status, details) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssssss', $member_id, $payment_date, $bank, $reason, $price, $sender, $status, $details);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: index.php?action=addpayment&status=error');
            }
        }
        header('Location: index.php?action=payments&status=success');
    }
}