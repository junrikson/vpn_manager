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
	$stmt = $mysqli->prepare('SELECT id, payment_date, bank, reason, price, sender, details FROM payments where id = '.$mysqli->real_escape_string($id)); 	
	if ($stmt) {
		$stmt->execute();
		$stmt->bind_result($id_temp, $payment_date_temp, $bank_temp, $reason_temp, $price_temp, $sender_temp, $details_temp);
		$stmt->store_result();
  		while ($stmt->fetch()) {
			$id = $id_temp;
			$payment_date = $payment_date_temp;
			$bank = $bank_temp;
			$reason = $reason_temp;
			$price = $price_temp;
			$sender = $sender_temp;
			$details = $details_temp;
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
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=edit_payment" method="post" >
			<header><h3>Konfirmasi Pembayaran</h3></header>            
				<div class="module_content">
                		<fieldset style="width:48%; float:left; margin-right:3%;">
							<label>Tanggal Bayar</label>
							<input name="payment_date" class="inputDate" id="inputDate" value="<?php echo $payment_date ?>" readonly="readonly" style="width:60%; -webkit-border-radius: 5px;
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
                        <fieldset style="width:48%; float:left;">
                            <label>Bank Tujuan</label>
							<select style="width:92%;" name="bank">
                            	<option value="BNI" selected="selected">BNI - 0284593197</option>
                                <option value="BCA">BCA - 7865135301</option>
							</select>
						</fieldset>
						<fieldset style="width:99%; float:left;">
                        	<label>Alasan Pembayaran</label>
<?php
if ($reason == "buy_from_product"){
	echo '
							<input type="hidden" style="width:92%;" name="reason" value="buy_from_product" />
							<input type="text" style="width:92%;" value="Pembayaran Akun" disabled="disabled" readonly="readonly" />';	
}
else{
	echo '
							<input type="text" style="width:92%;" name="reason" placeholder="Contoh : Pembayaran Akun" />';
}
?>
                            
						</fieldset>
                        <fieldset style="width:99%; float:left;">
                        	<label>Jumlah Pembayaran (Rupiah)</label>
							<input type="text" style="width:92%;" name="price" value="<?php echo ($price + 0) ?>" />';						
						</fieldset>	
                        <fieldset style="width:99%; float:left;">
                        	<label>Pengirim</label>
							<input type="text" style="width:92%;" name="sender" placeholder="Contoh : BNI - 0284593197 a/n AGNES MONICA" value="<?php echo $sender ?>" />
						</fieldset>
                        <fieldset style="width:99%; float:left;">
                        	<label>Keterangan</label>							
                            <textarea style="width:92%;" name="details" ><?php echo $details ?></textarea>';
						</fieldset>
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Submit" class="alt_btn">
				</div>
			</footer>
            <input type="hidden" name="payment_id" value="<?php echo $id; ?>" />            
            </form>              
		</article>
        
        <br/>&nbsp;<br/>&nbsp;<br/>     

<?php
$stmt->close();
endif; 

} ?>	