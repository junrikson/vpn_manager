<?php
if(!defined('MyConst')) {
   die('Go Away!');
}
include_once 'db_connect.php';
$error_msg = "";
 
if (isset($_POST['username'], $_POST['password'], $_POST['details'])) {
    // Sanitize and validate the data passed in
    $username = $mysqli->real_escape_string(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $password = $mysqli->real_escape_string(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));
    $details = $mysqli->real_escape_string(filter_input(INPUT_POST, 'details', FILTER_SANITIZE_STRING));
	$member_id = $_SESSION['user_id'];
    
    $prep_stmt = "SELECT id FROM accounts WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows > 0) {
            // A user with this email address already exists
            header('Location: ./clientarea.php?action=addaccount&status=duplicate');
			$error_msg = "A user with this email address already exists.";
        }
    } else {
        header('Location: ./clientarea.php?action=addaccount&status=error');
		$error_msg = "Database error.";
    }
	
	
	$prep_stmt = "SELECT status FROM accounts WHERE (( member_id = ? ) and ( status = 'N' ))";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $member_id);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows > 4) {
            // A user with this email address already exists
            header('Location: ./clientarea.php?action=addaccount&status=max');
			$error_msg = "A user with this email address already exists.";
        }
    } else {
        header('Location: ./clientarea.php?action=addaccount&status=error');
		$error_msg = "Database error.";
    }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
		$expired = date('Y-m-d');
		$status = 'N';
       if ($insert_stmt = $mysqli->prepare("INSERT INTO accounts (username, password, member_id, expired, details, status) VALUES (?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('ssssss', $username, $password, $member_id, $expired, $details, $status);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ./clientarea.php?action=addaccount&status=error');
            }
        }
        header('Location: ./clientarea.php?action=viewaccounts&status=success');
    }
}