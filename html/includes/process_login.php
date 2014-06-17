<?php
include_once 'db_connect.php';
include_once 'functions.php';
 
sec_session_start(); // Our custom secure way of starting a PHP session.
 
if (isset($_POST['email'], $_POST['p'], $_POST['captcha'])) {
    $email = $mysqli->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $password = $mysqli->real_escape_string(filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING)); // The hashed password.
	$captcha = $mysqli->real_escape_string(filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_NUMBER_INT));
 
 	$temp = $_SESSION["code"] ; 
	
	if (($captcha == "") or ($captcha != $temp)){		
        header('Location: ../clientarea.php?status=3');
	}
    elseif (login($email, $password, $mysqli) == true) {
        // Login success 
        header('Location: ../clientarea.php');
    } else {
        // Login failed 
        header('Location: ../clientarea.php?status=2');
    }
} else {
    // The correct POST variables were not sent to this page. 
    header('Location: ../clientarea.php?status=4');
}