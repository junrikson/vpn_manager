<?php
if (isset($_COOKIE["referral"]) == false){
	setcookie("referral","0", time()+3600*24, "/");	
}

$tittle = 'VPNku.net - Registration Page';
$page = 'register';
include_once 'header.php';
include_once 'includes/register.inc.php';

if (login_check($mysqli) == true) : 
	header('Location: ./clientarea.php');						
else : 

$status = 0;
if(array_key_exists('status', $_GET)){
	$status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
}
if($status == 1){
	$error_msg = 'Registrasi sukses! Silahkan <a href="clientarea.php"><span style="color: #F00;">Log in</span></a> untuk memulai.';	
}
elseif($status == 2){
	$error_msg = 'Terjadi kesalahan pada database. Silahkan coba lagi atau hubungi kontak yang tersedia.';	
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
        <form id="register" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="registration_form">
          	<h1>Register</h1>
        	<fieldset id="inputs">
            	<input type="text" name="username" id="username" placeholder="Nama Depan / Nickname" /> 
                <input type="text" name="email" id="email" placeholder="Alamat Email" />
                <input type="password" name="password" id="password" placeholder="Password" />
                <input type="password" name="confirmpwd" id="confirmpwd" placeholder="Konfirmasi Password" />
                <input type="hidden" name="referral" value="<?php echo $_COOKIE["referral"]; ?>" />
                <div id="captcha" align="center">
                <input type="text" name="captcha" id="captcha" placeholder="Angka yang terlihat / CAPTCHA" / value="">
                <img src="./includes/captcha.php" style="text-align:center; vertical-align:middle; margin-left: 14px" />
                </div>
            </fieldset>
            <fieldset id="actions">
            	<input type="button" id="submit2" value="Register" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password, this.form.confirmpwd);" />
             	<a href="clientarea.php">Sudah ada akun? Log in!</a> 
            </fieldset> 
        </form>
<?php endif;?>

	</div>
</div>
<?php include_once 'footer.php'; ?>