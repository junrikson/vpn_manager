<?php
$tittle = 'VPNku.net - Forgot Password';
$page = 'register';
include_once 'header.php';
include_once 'includes/process_forgot.php';

if(array_key_exists('id', $_GET)){
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
}
if(array_key_exists('token', $_GET)){
	$token = filter_input(INPUT_GET, 'token', FILTER_SANITIZE_STRING);
}

if (login_check($mysqli) == true) : 
	header('Location: ./clientarea.php');
	
elseif ((!empty($id)) and (!empty($token))) :

	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$prep_stmt = "SELECT username FROM members WHERE (email = ? and password = ?) LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 	if ($stmt) {
        $stmt->bind_param('ss', $mysqli->real_escape_string($id), $mysqli->real_escape_string($token));
        $stmt->execute();
        $stmt->bind_result($temp);
		$stmt->store_result();
 		while ($stmt->fetch()) {
			$username = $temp;
    	}
        if ($stmt->num_rows < 1) {
            $status = 1;
        }
    } 
		
if($status == 1){
	$error_msg = 'Invalid Token.';	
}

?>
    <div class="about_desc section" id="section-2" align="center">
    <div id="container" style="width: 800px;" align="center">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <?php
        if (!empty($error_msg)) {
            echo '<div style="background-color: #131A25; color: #FF0; padding: 30px; margin-bottom:15px; margin-top:-30px; font-weight:bold;" align="center">
		'.$error_msg.'</div>';
		}
        else { echo '
        <form id="login" action="'.esc_url($_SERVER['PHP_SELF']).'" method="post" name="registration_form">
          	<h1>Recovery</h1>
        	<fieldset id="inputs">
            	<input type="hidden" name="username" value="'.$username.'"/> 
                <input type="hidden" name="email" value="'.$id.'"/>
                <input type="hidden" name="token" value="'.$token.'"/>
                <input type="password" name="password" id="password" placeholder="New Password" />
                <input type="password" name="confirmpwd" id="confirmpwd" placeholder="Konfirmasi Password" />
                <div id="captcha" align="center">
                <input type="text" name="captcha" id="captcha" placeholder="Angka yang terlihat / CAPTCHA" / value="">
                <img src="./includes/captcha.php" style="text-align:center; vertical-align:middle; margin-left: 14px" />
                </div>
            </fieldset>
            <fieldset id="actions">
            	<input type="button" id="submit2" value="Update" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" />
            </fieldset> 
        </form>';
		}
else : 

$status = 0;
if(array_key_exists('status', $_GET)){
	$status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
}
if($status == 1){
	$error_msg = 'Ikuti petunjuk yang sudah dikirimkan ke email anda. Cek SPAM folder jika tidak terdapat di Inbox anda.';	
}
elseif($status == 2){
	$error_msg = 'Terjadi kesalahan pada database. Silahkan coba lagi atau hubungi kontak yang tersedia.';	
}
elseif($status == 3){
	$error_msg = 'Email yang anda masukkan tidak ditemukan.';	
}

?>
    <div class="about_desc section" id="section-2" align="center">
    <div id="container" style="width: 800px;" align="center">
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <?php
        if (!empty($error_msg)) {
            echo '<div style="background-color: #131A25; color: #FF0; padding: 30px; margin-bottom:15px; margin-top:-30px; font-weight:bold;" align="center">
		'.$error_msg.'</div>';
        }
        ?>
        <form id="forgot" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
          	<h1>Recovery</h1>
        	<fieldset id="inputs">
            	<input type="text" name="email" id="email" placeholder="Alamat Email" />
                <div id="captcha" align="center">
                <input type="text" name="captcha" id="captcha" placeholder="Angka yang terlihat / CAPTCHA" / value="">
                <img src="./includes/captcha.php" style="text-align:center; vertical-align:middle; margin-left: 14px" />
                </div>
            </fieldset>
            <fieldset id="actions">
            	<input type="Submit" id="submit2" value="Send" />
             	<a href="clientarea.php">Sudah ingat password? Log in!</a> 
            </fieldset> 
        </form>
<?php endif;?>

	</div>
</div>
<?php include_once 'footer.php'; ?>