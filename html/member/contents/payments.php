<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}
function error($status){
	if ($status == 'success'){
		echo '<h4 class="alert_success">Pembuatan Payment sukses!</h4>';	
	}
	elseif ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'invalid'){
		echo '<h4 class="alert_error">Akun yang anda pilih tidak ditemukan.</h4>';	
	}
	elseif ($status == 'max'){
		echo '<h4 class="alert_error">5 akun anda masih dalam keadaan pending. Mohon tunggu aktivasi atau hubungi salah satu kontak yang tersedia.</h4>';	
	}
}

function init_user_id($status, $member_id, $id, $price_2, $reason_2, $details_2){
if (!empty($status)){
	if ($status == 'success'){
		echo '<h4 class="alert_success">Pembuatan Payment sukses!</h4>';	
	}
	if ($status == 'update_success'){
		echo '<h4 class="alert_success">Update Payment sukses!</h4>';	
	}
	if ($status == 'delete_success'){
		echo '<h4 class="alert_success">Delete Payment sukses!</h4>';	
	}
	elseif ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'invalid'){
		echo '<h4 class="alert_error">Akun yang anda pilih tidak ditemukan.</h4>';	
	}
	elseif ($status == 'max'){
		echo '<h4 class="alert_error">5 akun anda masih dalam keadaan pending. Mohon tunggu aktivasi atau hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'duplicate'){
		echo '<h4 class="alert_error">Akun yang anda pilih sudah dibuka Payment. Lakukan pembayaran atau klik tombol edit untuk merubah pesanan anda.</h4>';	
	}
	
}
if (!empty($id)) : ?>
<article class="module width_3_quarter">
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=payments" method="post" >
			<header><h3>Konfirmasi Pembayaran</h3></header>            
				<div class="module_content">
                		<fieldset style="width:48%; float:left; margin-right:3%;">
							<label>Tanggal Bayar</label>
							<input name="payment_date" class="inputDate" id="inputDate" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" style="width:60%; -webkit-border-radius: 5px;
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
if (!empty($reason_2)){
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
<?php
if (!empty($price_2)){
	echo '
							<input type="text" style="width:92%;" name="price" value="'.$price_2.'" />';	
}
else{
	echo '
							<input type="text" style="width:92%;" name="price" placeholder="Contoh : 50022 (Tanpa tanda Rp dan titik atau koma)" />';
}
?>							
						</fieldset>	
                        <fieldset style="width:99%; float:left;">
                        	<label>Pengirim</label>
							<input type="text" style="width:92%;" name="sender" placeholder="Contoh : BNI - 0284593197 a/n AGNES MONICA" />
						</fieldset>
                        <fieldset style="width:99%; float:left;">
                        	<label>Keterangan</label>
<?php
if (!empty($details_2)){
	echo '							
                            <textarea style="width:92%;" name="details" >'.$details_2.'</textarea>';	
}
else{
	echo '							
                            <textarea style="width:92%;" name="details" placeholder="Contoh : Pembayaran transaksi #22, sejumlah Rp 50022" ></textarea>';
}
?>	
						</fieldset>
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Submit" class="alt_btn">
				</div>
			</footer>
            </form>              
		</article>
        <article class="module width_quarter">
			<header><h3>Bank Support</h3></header>
            <div align="center">
			<span style="font-weight:bold"><br/><img src="./member/images/bni.png" width="120" height="40" /><br/>BNI - 0284593197<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/><img src="./member/images/bca.png" width="120" height="40" /><br/>BCA - 7865135301<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/></span>
            </div>
			<footer>				
			</footer>
		</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>       





<?php 
else :
?>
<div style="text-align:left; margin: 10px 32px; text-align:justify"><span style="font-weight:bold;">Harga yang tertera sudah termasuk kode unik. Kirimkan ke salah satu bank yang tersedia sesuai dengan jumlah yang tertera dan klik tombol Konfirmasi Pembayaran setelah melakukan pembayaran. Untuk membayar akun lainnya sekaligus, pilih <a href="./clientarea.php?action=viewinvoice">VIEW INVOICE</a> dan tambahkan akun yang akan dibayar/perpanjang.</span></div>
		
<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Daftar Payments</h3>
        <ul class="tabs">
   			<li><a href="#tab1">Pending</a></li>
    		<li><a href="#tab2">Paid</a></li>
		</ul>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>ID</th> 
    				<th>Tanggal</th> 
    				<th>Bank</th>                     
    				<th>Keterangan</th>                     
					<th>Actions</th>                     
					<th>Harga</th> 
    			</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		
	$stmt = $mysqli->prepare("SELECT id, payment_date, bank, details, price FROM payments where ((member_id = ?) and (status = 'N')) ORDER by id");
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($id, $payment_date, $bank, $details, $price );
	
	while ($stmt->fetch()) {
		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$payment_date.'</td> 
   				<td>'.$bank.'</td> 
   				<td>'.$details.'</td> 
   				<td><a href="./clientarea.php?action=edit_payment&id='.$id.'"><img src="./member/images/icn_edit.png" title="Edit Item" alt="Edit" /></a>&nbsp; &nbsp; &nbsp; <a href="./clientarea.php?action=delete_payment&id='.$id.'"><img src="./member/images/icn_trash.png" title="Delete Item" alt="Delete" /></a></td> 
				<td style="text-align: right;">Rp '.$price.'</td> 
    		</tr>';
    }
?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>ID</th> 
    				<th>Tanggal</th> 
    				<th>Bank</th>                     
    				<th>Keterangan</th>                     
					<th>Harga</th> 
    			</tr> 
			</thead> 
			<tbody>
<?php
	$stmt = $mysqli->prepare("SELECT id, payment_date, bank, details, price FROM payments where ((member_id = ?) and (status = 'Y')) ORDER by id");
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($id, $payment_date, $bank, $details, $price );
	
	while ($stmt->fetch()) {
		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$payment_date.'</td> 
   				<td>'.$bank.'</td> 
   				<td>'.$details.'</td> 
   				<td style="text-align: right;">Rp '.$price.'</td> 
    		</tr>';
    }
?>           
            </tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div>
	</article>
    <article class="module width_quarter">
			<header><h3>Bank Support</h3></header>
            <div align="center">
			<span style="font-weight:bold"><br/><img src="./member/images/bni.png" width="120" height="40" /><br/>BNI - 0284593197<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/><img src="./member/images/bca.png" width="120" height="40" /><br/>BCA - 7865135301<br/>a/n UTOMO DAMENTA<br/>&nbsp;<br/></span>
            </div>
			<footer>				
			</footer>
	</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>

<?php 
$stmt->close();
endif; 

} ?>		