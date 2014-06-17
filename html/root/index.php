<?php
include_once './includes/db_connect.php';
include_once './includes/functions.php';
include_once '../config.php';
sec_session_start();
 
if (login_check($mysqli) == true) :
	define('MyConst', TRUE);	
 	$action = 'default';
	$status = 'status';
	$id = "";
	$user_id = $_SESSION['user_id'];
	if(array_key_exists('action', $_GET)){
		$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);		
	}
	if(array_key_exists('status', $_GET)){
		$status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);		
	}
	if(array_key_exists('id', $_GET)){
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);		
	}
	
	if($action == "addaccount"){
		include_once './includes/process_addaccount.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "addpayment"){
		include_once './includes/process_addpayment.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "invoices"){
		include_once './includes/process_invoices.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "payments"){
		include_once './includes/process_payments.php';
		$command = "";
		if(array_key_exists('command', $_GET)){
			$command = filter_input(INPUT_GET, 'command', FILTER_SANITIZE_STRING);
		}
		include_once 'content.php';
		init($action, $status, $user_id, $id);
		init_payments($command, $status, $user_id, $id);
	}
	elseif($action == "edit_invoice"){
		include_once './includes/process_edit_invoice.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "edit_account"){
		include_once './includes/process_edit_account.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "edit_member"){
		include_once './includes/process_edit_member.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "delete_invoice"){
		include_once './includes/process_delete_invoice.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "edit_payment"){
		include_once './includes/process_edit_payment.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "delete_payment"){
		include_once './includes/process_delete_payment.php';
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	}
	elseif($action == "viewaccounts"){
		$command = "";
		if(array_key_exists('command', $_GET)){
			$command = filter_input(INPUT_GET, 'command', FILTER_SANITIZE_STRING);
		}
		include_once 'content.php';
		init($action, $status, $user_id, $id);
		init_viewaccounts($command, $status, $user_id, $id);
	}
	elseif($action == "viewmembers"){
		$command = "";
		if(array_key_exists('command', $_GET)){
			$command = filter_input(INPUT_GET, 'command', FILTER_SANITIZE_STRING);
		}
		include_once 'content.php';
		init($action, $status, $user_id, $id);
		init_viewmembers($command, $status, $user_id, $id);
	}			
	else{
		include_once 'content.php';
		init($action, $status, $user_id, $id);
	};
	
else : 
	$tittle = 'VPNku.net - Member Area';
	$page = 'clientarea';
	include_once 'header.php';

	$status = 0;
	if(array_key_exists('status', $_GET)){
		$status = filter_input(INPUT_GET, 'status', FILTER_SANITIZE_STRING);
	}
	if($status == 2){
		$error_msg = 'Username atau password anda salah!';	
	}
	elseif($status == 1){
		$error_msg = 'Terjadi kesalahan pada database. Silahkan coba lagi atau hubungi kontak yang tersedia.';	
	}
	elseif($status == 3){
		$error_msg = 'Captcha tidak sama.';	
	}
	elseif($status == 4){
		$error_msg = 'Terjadi kesalahan pada System. Silahkan coba lagi atau hubungi kontak yang tersedia.';	
	}
?>
    <div class="about_desc section" id="section-2" align="center">
    <div id="container" style="width: 500px;" align="left">
<?php
if (!empty($error_msg)) {
	echo '<div style="background-color: #131A25; color: #FF0; padding: 30px; margin-bottom:15px; margin-top:-30px; font-weight:bold;" align="center">'.$error_msg.'</div>';
}
        
if (isset($_GET['error'])) {
	echo '<div style="background-color: #131A25; color: #FF0; padding: 30px; margin-bottom:15px; margin-top:-30px; font-weight:bold;" align="center"><p>Error Logging In!</p></div>';
}
?>
	<form id="login" action="./includes/process_login.php" method="post" name="login_form">
  	<h1>Log In</h1>
 		<fieldset id="inputs">
     		<input id="username" name="email" type="text" placeholder="Email Address" autofocus required>   
      		<input id="password" name="password" type="password" placeholder="Password" required>
            <div id="captcha" align="center">
                <input type="text" name="captcha" id="captcha" placeholder="Angka yang terlihat / CAPTCHA" value="" />
                <img src="./includes/captcha.php" style="text-align:center; vertical-align:middle; margin-left: 14px" />
          	</div>
   		</fieldset>
    	<fieldset id="actions">
        	<input type="button" id="submit2" value="Login" onsubmit="formhash(this.form, this.form.password);" onclick="formhash(this.form, this.form.password);" />
    	</fieldset>
	</form>
	</div>
</div>

<?php include_once 'footer.php'; 
endif; ?>
