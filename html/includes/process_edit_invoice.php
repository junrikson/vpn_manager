<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = "";
 
if (isset($_POST['product_id'], $_POST['invoice_id'], $_POST['account_name'])) {
	// Sanitize and validate the data passed in
    $product_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_STRING));
    $account_name = $mysqli->real_escape_string(filter_input(INPUT_POST, 'account_name', FILTER_SANITIZE_STRING));
    $member_id = $mysqli->real_escape_string($_SESSION['user_id']);
    $invoice_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'invoice_id', FILTER_SANITIZE_STRING));
    
	$status = "'N'";

	$stmt = $mysqli->prepare('SELECT account_name FROM invoices where (id = '.$invoice_id.' and member_id = '.$member_id.' and status = '.$status.') LIMIT 1'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows < 1){
			header('Location: ./clientarea.php?action=edit_invoice&status=invalid');
			$error_msg = "Database error.";
		}
	}
	else {
        header('Location: ./clientarea.php?action=edit_invoice&status=error');
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
        header('Location: ./clientarea.php?action=edit_invoice&status=error');
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
        header('Location: ./clientarea.php?action=edit_invoice&status=error');
		$error_msg = "Database error.";
    }
 	
	$price = $price * $ratio;
	$status = 'N';
	if (empty($error_msg)) {
		$details = $product_name.' for '.$account_name;
		$create_date = date('Y-m-d');	    
  	  if ($update_stmt = $mysqli->prepare("UPDATE invoices SET product_id = ?, product_name = ?, price = ?, details = ?, status = ? WHERE ((id = ?) and (member_id = ?))")) {
 	 		$update_stmt->bind_param('sssssss', $product_id, $product_name, $price, $details, $status, $invoice_id, $member_id);
		if (! $update_stmt->execute()) {
			header('Location: ./clientarea.php?action=edit_invoice&status=error');
   	  	}
 	}
	header('Location: ./clientarea.php?action=invoices&status=update_success');   
	}
}