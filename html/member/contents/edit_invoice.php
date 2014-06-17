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
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=edit_invoice" method="post" >            
			<header><h3>Edit Invoice</h3></header> 
				<div class="module_content">
                		<fieldset style="width:99%; float:left; margin-right: 3%;">
							<label>Untuk Akun</label>
							<input type="text" style="width:92%;" name="account_name" readonly="readonly" value="<?php echo $username; ?>">
						</fieldset>
                        <fieldset style="width:99%; float:left; margin-right: 3%;">
							<label>Jenis Akun</label>
							<select style="width:92%;" name="product_id">
<?php
	$ratio = 1;
	$stmt = $mysqli->prepare('SELECT ratio FROM members where id = '.$mysqli->real_escape_string($member_id)); 	
	$stmt->execute();
	$stmt->bind_result($temp);
	while ($stmt->fetch()) {
		$ratio = $temp;
    }
	
	$stmt = $mysqli->prepare("SELECT id, name, price, details, status FROM products where price > 0 ORDER by price"); 	
	$stmt->execute();
	$stmt->bind_result($product_id, $name, $price, $details, $status);
	$i = 1;
    while ($stmt->fetch()) {
		if($i == 1){
			echo '
								<option value="'.$product_id.'" selected="selected">'.$name.' = Rp '.$price * $ratio.'</option>';
		}
		else{
			echo '
								<option value="'.$product_id.'">'.$name.' = Rp '.$price * $ratio.'</option>';		
		}
		$i++;
    }
?>								</select>
						</fieldset>	
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Update" class="alt_btn">
				</div>
			</footer>
            <input type="hidden" name="invoice_id" value="<?php echo $id; ?>" />
            </form>              
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