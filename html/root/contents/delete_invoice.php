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
	$stmt = $mysqli->prepare('SELECT account_name FROM invoices where id = '.$mysqli->real_escape_string($id)); 	
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
        
       
       	<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;   

<?php
$stmt->close();
endif; 

} ?>	