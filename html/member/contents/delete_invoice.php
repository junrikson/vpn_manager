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
if ($status == 'error'){
	echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
}
elseif ($status == 'invalid'){
	echo '<h4 class="alert_error">Akun yang anda pilih tidak ditemukan.</h4>';	
}
if (!empty($id)) :	
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);		
	$status = "'N'";			
	$stmt = $mysqli->prepare('SELECT account_name FROM invoices where (id = '.$mysqli->real_escape_string($id).' and member_id = '.$mysqli->real_escape_string($member_id).' and status = '.$status.')'); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->bind_result($temp);
		$stmt->store_result();
  		while ($stmt->fetch()) {
			$username = $temp;
   	 	}
		if ($stmt->num_rows < 1){
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

<article class="module width_3_quarter">
			<header><h3>Delete Invoice</h3></header> 
				<div class="module_content">
                		Apakah kamu yakin untuk menghapus transaksi #<?php echo $id; ?> ?                       
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=delete_invoice" method="post" >  
                    	<input type="submit" value="Yes" class="alt_btn" style="position: absolute;" />
                        <input type="hidden" name="invoice_id" value="<?php echo $id; ?>" />
            		</form> 
                    <form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=invoices" method="post" >     
                    	<input type="submit" value="No" style="margin-left: 60px;" />
                    </form>                    
				</div>
			</footer>                         
		</article>
        
        <article class="module width_quarter">
			<header><h3>Bank Support</h3></header>
            <div align="center">
			<span style="font-weight:bold"><br/><img src="./member/images/bni.png" width="120" height="40" /><br/>BNI - 0284593197<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/><img src="./member/images/bca.png" width="120" height="40" /><br/>BCA - 7865135301<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/></span>
            </div>
			<footer>				
			</footer>
		</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;   

<?php
$stmt->close();
endif; 

} ?>	