<?php
include_once 'db_connect.php';
$referral = 1; 
$referral_ratio = 1;
$error_msg = "";

if (isset($_POST['username'], $_POST['email'], $_POST['p'], $_POST['referral'], $_POST['captcha'])) {
    // Sanitize and validate the data passed in
    $username = $mysqli->real_escape_string(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
    $email = $mysqli->real_escape_string(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));
    $reff = $mysqli->real_escape_string(filter_input(INPUT_POST, 'referral', FILTER_SANITIZE_NUMBER_INT));
    $captcha = $mysqli->real_escape_string(filter_input(INPUT_POST, 'captcha', FILTER_SANITIZE_NUMBER_INT));
    $email = $mysqli->real_escape_string(filter_var($email, FILTER_VALIDATE_EMAIL));
	
	$query = "SELECT email, reff_ratio FROM members WHERE id =".$reff;
                if ($result = $mysqli->query($query)) {
                    while ($row = $result->fetch_object()) {
                        $referral = $row->email ;
						$referral_ratio = $row->reff_ratio ; 
                    }   
                }
	
	$temp = $_SESSION["code"] ; 
	
	if (($captcha == "") or ($captcha != $temp)){
		$error_msg .= '<p class="error">Captcha yang anda masukkan tidak sesuai.</p>';
	}
				
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Not a valid email
        $error_msg .= '<p class="error">Email yang anda gunakan tidak valid.</p>';
    }
 
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    if (strlen($password) != 128) {
        // The hashed pwd should be 128 characters long.
        // If it's not, something really odd has happened
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    // Username validity and password validity have been checked client side.
    // This should should be adequate as nobody gains any advantage from
    // breaking these rules.
    //
    $confirmation_code = md5(rand(10000, 99999));
    $prep_stmt = "SELECT id FROM members WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            // A user with this email address already exists
            $error_msg .= '<p class="error">Email sudah pernah digunakan.</p>';
        }
    } else {
        $error_msg .= '<p class="error">Ada kesalahan pada database.</p>';
    }
 
    // TODO: 
    // We'll also have to account for the situation where the user doesn't have
    // rights to do registration, by checking what type of user is attempting to
    // perform the operation.
 
    if (empty($error_msg)) {
        // Create a random salt
        $random_salt = hash('sha512', uniqid(openssl_random_pseudo_bytes(16), TRUE));
 
        // Create salted password 
        $password = hash('sha512', $password . $random_salt);
 
        // Insert the new user into the database 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO members (reff_id, ratio, username, email, password, salt, confirmation) VALUES (?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssss', $referral, $referral_ratio, $username, $email, $password, $random_salt, $confirmation_code);
            // Execute the prepared query.
            if (! $insert_stmt->execute()) {
                header('Location: ./register.php?status=2');
            }
        }
	 $message = "Selamat datang di VPNku.net.\r\n\r\nMasukkan kode konfirmasi ini jika ditanya :\r\n".$confirmation_code."\r\n\r\nUntuk informasi dan pertanyaan silahkan melalui Chatbox pada www.vpnku.net dan Aplikasi VPNku atau melalui Facebook Fanpage/Group.\r\n\r\nTerima Kasih\r\nVPNku Team\r\n\r\n----------------------------------------------------------\r\nWebsite : http://www.vpnku.net/\r\nFanpage : https://www.facebook.com/vpnku.net\nInject Group : https://www.facebook.com/groups/vpnku.net/";
	 mail($email ,"Welcome to VPNku.net" ,$message ,"From: VPNku.net <no-reply@vpnku.net>\r\nReply-To: vpnku_cs01@yahoo.com");
        header('Location: ./register.php?status=1');
    }
}