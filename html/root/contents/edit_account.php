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
	$stmt = $mysqli->prepare('SELECT id, username, password, member_id, expired, hwid, details, status FROM accounts where id = '.$mysqli->real_escape_string($id)); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->bind_result($id_temp, $username_temp, $password_temp, $member_id_temp, $expired_temp, $hwid_temp, $details_temp, $status_temp);
		$stmt->store_result();
            	while ($stmt->fetch()) {
			$id = $id_temp;
			$username = $username_temp;
			$password = $password_temp;
			$member_id = $member_id_temp;
			$expired = $expired_temp;
			$hwid = $hwid_temp;
			$details = $details_temp;
			$status = $status_temp;
   	 	}
		if (($stmt->num_rows) < 1){
			$username = "";	
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
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=edit_account" method="post" >
			<header><h3>Konfirmasi Pembayaran</h3></header>
            		<div class="module_content">
                		<fieldset style="width:47%; float:left; margin-right: 3%;">
                        	<label>Member ID</label>
							<input type="text" style="width:92%;" name="member_id" value="<?php echo $member_id ?>" />						
						</fieldset>
                        <fieldset style="width:47%; float:left;">
                        	<label>Status</label>
							<input type="text" style="width:92%;" name="status" value="<?php echo $status ?>" />					
						</fieldset>
                        <fieldset style="width:47%; float:left; margin-right: 3%;">
                        	<label>Username</label>
							<input type="text" style="width:92%;" name="username" value="<?php echo $username ?>" />					
						</fieldset>
                        <fieldset style="width:47%; float:left;">
                        	<label>Password</label>
							<input type="text" style="width:92%;" name="password" value="<?php echo $password ?>" />						
						</fieldset>
                        <fieldset style="width:47%; float:left; margin-right: 3%;">
                        	<label>Expired</label>
                            <input name="expired" class="inputDate" id="inputDate" value="<?php echo $expired ?>" style="width:100px; -webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
border: 1px solid #BBBBBB;
height: 20px;
color: #666666;
-webkit-box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
-moz-box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
box-shadow: inset 0 2px 2px #ccc, 0 1px 0 #fff;
padding-left: 10px;
background-position: 10px 6px;
margin: 0;
display: block;
float: left;
width: 92%;
margin: 0 10px;" />						
						</fieldset>
                        <fieldset style="width:47%; float:left;">
                        	<label>Hardware ID</label>
							<input type="text" style="width:92%;" name="hwid" value="<?php echo $hwid ?>" />						
						</fieldset>
                        <fieldset style="width:99%; float:left;">
                        	<label>Keterangan</label>
							<input type="text" style="width:92%;" name="details" value="<?php echo $details ?>" />						
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