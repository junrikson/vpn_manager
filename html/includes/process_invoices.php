<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = "";
 
if (isset($_POST['product_id'], $_POST['account_id'], $_POST['account_name'])) {
	// Sanitize and validate the data passed in
    $product_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING));
    $member_id = $mysqli->real_escape_string($_SESSION['user_id']);
    $account_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'account_id', FILTER_SANITIZE_STRING));
    $account_name = $mysqli->real_escape_string(filter_input(INPUT_POST, 'account_name', FILTER_SANITIZE_STRING));
    
	$stmt = $mysqli->prepare('SELECT username FROM accounts where (id = '.$account_id.' and member_id = '.$member_id.') LIMIT 1'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows < 1){
			header('Location: ./clientarea.php?action=invoices&status=invalid');
			$error_msg = "Database error.";
		}
	}
	else {
        header('Location: ./clientarea.php?action=invoices&status=error');
		$error_msg = "Database error.";
    }
	
	$status = "'N'";
	$stmt = $mysqli->prepare('SELECT id FROM invoices where ((account_id = '.$account_id.') and (member_id = '.$member_id.') and (status = '.$status.')) LIMIT 1'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows > 0){
			header('Location: ./clientarea.php?action=invoices&status=duplicate');
			$error_msg = "Database error.";
		}
	}
	else {
        header('Location: ./clientarea.php?action=invoices&status=error');
		$error_msg = "Database error.";
    }
	
	$ratio = 1;
	$stmt = $mysqli->prepare('SELECT username, ratio FROM members where id = '.$member_id); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->bind_result($temp, $temp2);
		while ($stmt->fetch()) {
			$member_name = $temp;
			$ratio = $temp2;
    	}		
	}
	else {
        header('Location: ./clientarea.php?action=invoices&status=error');
		$error_msg = "Database error.";
    }
	
	$price = 0;
	$stmt = $mysqli->prepare('SELECT name, price FROM products where id = '.$product_id); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->bind_result($temp, $temp2);
		while ($stmt->fetch()) {
			$product_name = $temp;
			$price = $temp2;
    	}
	}
	else {
        header('Location: ./clientarea.php?action=invoices&status=error');
		$error_msg = "Database error.";
    }
 	
	$price = $price * $ratio;
	$status = 'N';
	if (empty($error_msg)) {
		$details = $product_name.' for '.$account_name;
		$create_date = date('Y-m-d');	    
  	  if ($insert_stmt = $mysqli->prepare("INSERT INTO invoices (create_date, member_id, member_name, account_id, account_name, product_id, product_name, price, details, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
 	 		$insert_stmt->bind_param('ssssssssss', $create_date, $member_id, $member_name, $account_id, $account_name, $product_id, $product_name, $price, $details, $status);
		if (! $insert_stmt->execute()) {
				header('Location: ./clientarea.php?action=invoices&status=error');
   	  	}
 	}
	header('Location: ./clientarea.php?action=invoices&status=success');   
	}
}