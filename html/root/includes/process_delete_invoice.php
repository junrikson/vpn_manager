<?php
if(!defined('MyConst')) {
   die('Go Away!');
} 
include_once 'db_connect.php';
$error_msg = "";

if (isset($_POST['invoice_id'])) {
	// Sanitize and validate the data passed in
    $member_id = $mysqli->real_escape_string($_SESSION['user_id']);
    $invoice_id = $mysqli->real_escape_string(filter_input(INPUT_POST, 'invoice_id', FILTER_SANITIZE_STRING));
    
	$status = "'N'";
	$stmt = $mysqli->prepare('SELECT account_name FROM invoices where id = '.$invoice_id.' LIMIT 1'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows < 1){
			header('Location: ./index.php?action=delete_invoice&status=invalid');
			$error_msg = "Database error.";
		}
	}
	else {
        header('Location: ./index.php?action=delete_invoice&status=error');
		$error_msg = "Database error.";
    }
		
	if (empty($error_msg)) {	    
  	  if ($update_stmt = $mysqli->prepare("DELETE FROM invoices WHERE id = ?")) {
 	 		$update_stmt->bind_param('s', $invoice_id);
		if (! $update_stmt->execute()) {
			header('Location: ./index.php?action=delete_invoice&status=error');
   	  	}
 	}
	header('Location: ./index.php?action=invoices&status=delete_success');   
	}
}