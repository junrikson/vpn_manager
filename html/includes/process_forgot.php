<?php
include_once 'db_connect.php';
$error_msg = "";
$token = 0;

if (isset($_POST['email'], $_POST['p'], $_POST['token'], $_POST['captcha'])) {
	$email = $mysqli->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $token = $mysqli->real_escape_string(filter_input(INPUT_POST, 'token', FILTER_SANITIZE_EMAIL));
    $captcha = $mysqli->real_escape_string(filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_NUMBER_INT));
    
	$temp = $_SESSION["code"] ;
	if (($captcha == "") or ($captcha != $temp)){
		$error_msg .= '<p class="error">Captcha yang anda masukkan tidak sesuai.</p>';
	}
	
	$password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    $prep_stmt = "SELECT id FROM members WHERE (email = ? and password = ?) LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('ss', $email, $token);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows < 1) {
            $error_msg .= '<p class="error">Invalid Token.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Ada kesalahan pada database.</p>';
    }
 
    if (empty($error_msg)) {
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
	  	$password = hash('sha512', $password . $random_salt);
 
        if ($update_stmt = $mysqli->prepare("UPDATE members SET password = ?, salt = ? WHERE (email = ? and password = ?)")) {
            $update_stmt->bind_param('ssss', $password, $random_salt, $email, $token);
            if (! $update_stmt->execute()) {
                header('Location: ./forgot.php?status=2');
            }
        }
	 	header('Location: ./clientarea.php');
    }
}
elseif (isset($_POST['email'], $_POST['captcha'])) {
    // Sanitize and validate the data passed in
    $email = $mysqli->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $captcha = $mysqli->real_escape_string(filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_NUMBER_INT));
    $email = $mysqli->real_escape_string(filter_var($email, FILTER_VALIDATE_EMAIL));
	
	$temp = $_SESSION["code"] ; 
	
	if (($captcha == "") or ($captcha != $temp)){
		$error_msg .= '<p class="error">Captcha yang anda masukkan tidak sesuai.</p>';
	}
				
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">Email yang anda masukkan tidak valid.</p>';
    }
 
    $prep_stmt = "SELECT password FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->bind_result($temp);
		$stmt->store_result();
 		while ($stmt->fetch()) {
			$token = $temp;
    	}
        if ($stmt->num_rows < 1) {
            $error_msg .= '<p class="error">Email yang anda masukkan tidak ditemukan.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Ada kesalahan pada database.</p>';
    }
 
    if (empty($error_msg)) {
        
	 $message = "Selamat datang di VPNku.net.\r\n\r\nKlik link di bawah ini untuk mereset password anda :\r\nhttp://www.vpnku.net/forgot.php?id=".$email."&token=".$token."\r\n\r\nUntuk informasi dan pertanyaan silahkan melalui Chatbox pada www.vpnku.net dan Aplikasi VPNku atau melalui Facebook Fanpage/Group.\r\n\r\nTerima Kasih\r\nVPNku Team\r\n\r\n----------------------------------------------------------\r\nWebsite : http://www.vpnku.net/\r\nFanpage : https://www.facebook.com/vpnku.net\nInject Group : https://www.facebook.com/groups/vpnku.net/";
	 mail($email ,"Forgot Password" ,$message ,"From: VPNku.net <no-reply@vpnku.net>\r\nReply-To: vpnku_cs01@yahoo.com");
        header('Location: ./forgot.php?status=1');
    }
}