<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}
function error($status){
	if ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'invalid'){
		echo '<h4 class="alert_error">Akun yang anda pilih tidak ditemukan.</h4>';	
	}
}
function init_user_id($status, $member_id, $id){	
if (!empty($status)){
	if ($status == "error"){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'invalid'){
		echo '<h4 class="alert_error">Akun yang anda pilih tidak ditemukan.</h4>';	
	}
}
if (!empty($id)) :	
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$stmt = $mysqli->prepare('SELECT id, ratio, reff_id, reff_ratio, username, email, status FROM members where id = '.$mysqli->real_escape_string($id)); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->bind_result($id_temp, $ratio_temp, $reff_id_temp, $reff_ratio_temp, $username_temp, $email_temp, $status_temp);
		$stmt->store_result();
		while ($stmt->fetch()) {
			$id = $id_temp;
			$ratio = $ratio_temp;
			$reff_id = $reff_id_temp;
			$reff_ratio = $reff_ratio_temp;
			$username = $username_temp;
			$email = $email_temp;
			$status = $status_temp;
   	 	}
		if (($stmt->num_rows) < 1){
			error("invalid");
			die();
		}
	}
	else {
        error("error");
		die();
    }
?>

<article class="module width_full">
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=edit_member" method="post" >
			<header><h3>Konfirmasi Pembayaran</h3></header>
            		<div class="module_content">
                		<fieldset style="width:47%; float:left; margin-right: 3%;">
                        	<label>Username</label>
							<input type="text" style="width:92%;" name="username" value="<?php echo $username ?>" />					
						</fieldset>
                        <fieldset style="width:47%; float:left;">
                        	<label>Email</label>
							<input type="text" style="width:92%;" name="email" value="<?php echo $email ?>" />						
						</fieldset>
                        <fieldset style="width:47%; float:left; margin-right: 3%;">
                        	<label>Status</label>
							<input type="text" style="width:92%;" name="status" value="<?php echo $status ?>" />				
						</fieldset>  
                        <fieldset style="width:47%; float:left;">
                        	<label>Referral ID</label>
							<input type="text" style="width:92%;" name="reff_id" value="<?php echo $reff_id ?>" />						
						</fieldset>
                        <fieldset style="width:47%; float:left; margin-right: 3%;">
                        	<label>Member Ratio</label>
							<input type="text" style="width:92%;" name="ratio" value="<?php echo $ratio ?>" />						
						</fieldset>
                        <fieldset style="width:47%; float:left;">
                        	<label>Referral Ratio</label>
							<input type="text" style="width:92%;" name="reff_ratio" value="<?php echo $reff_ratio ?>" />						
						</fieldset>                                                      
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Submit" class="alt_btn">
				</div>
			</footer>
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            </form>              
		</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;
<?php
$stmt->close();
endif; 

} ?>