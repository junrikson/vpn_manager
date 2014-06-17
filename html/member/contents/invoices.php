<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}
function error($status){
	if ($status == 'success'){
		echo '<h4 class="alert_success">Pembuatan Invoice sukses!</h4>';	
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
function init_user_id($status, $member_id, $id){
if (!empty($status)){
	if ($status == 'success'){
		echo '<h4 class="alert_success">Pembuatan Invoice sukses!</h4>';	
	}
	if ($status == 'update_success'){
		echo '<h4 class="alert_success">Update Invoice sukses!</h4>';	
	}
	if ($status == 'delete_success'){
		echo '<h4 class="alert_success">Delete Invoice sukses!</h4>';	
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
		echo '<h4 class="alert_error">Akun yang anda pilih sudah dibuka invoice. Lakukan pembayaran atau klik tombol edit untuk merubah pesanan anda.</h4>';	
	}
	
}
if (!empty($id)) :
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);		
	$stmt = $mysqli->prepare('SELECT username FROM accounts where (id = '.$mysqli->real_escape_string($id).' and member_id = '.$mysqli->real_escape_string($member_id).')'); 	
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
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=invoices" method="post" >            
			<header><h3>Order Pembelian / Perpanjangan Akun</h3></header> 
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
					<input type="submit" value="Submit" class="alt_btn">
				</div>
			</footer>
            <input type="hidden" name="account_id" value="<?php echo $id; ?>" />
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
else :
?>
<div style="text-align:left; margin: 10px 32px; text-align:justify"><span style="font-weight:bold;">Harga yang tertera sudah termasuk kode unik. Kirimkan ke salah satu bank yang tersedia sesuai dengan jumlah yang tertera dan klik tombol Konfirmasi Pembayaran setelah melakukan pembayaran. Untuk membayar akun lainnya sekaligus, pilih <a href="./clientarea.php?action=viewaccounts">VIEW ACOOUNTS</a> dan tambahkan akun yang akan dibayar/perpanjang.</span></div>
		
<article class="module width_3_quarter">
		<header><h3 class="tabs_involved">Daftar Invoice</h3>
        <ul class="tabs">
   			<li><a href="#tab1">Active</a></li>
    		<li><a href="#tab2">Inactive</a></li>
		</ul>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>ID</th> 
    				<th>Tanggal</th> 
    				<th>Keterangan</th>                     
    				<th>Actions</th>                     
					<th>Harga</th> 
    			</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		
	$stmt = $mysqli->prepare("SELECT id, create_date, price, details FROM invoices where ((member_id = ?) and (status = 'N')) ORDER by create_date");
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($id, $create_date, $price, $details);
	
	$total = 0;
	$payments_details = "Invoice";
	while ($stmt->fetch()) {
		$payments_details = $payments_details.' #'.$id.',' ;		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$create_date.'</td> 
   				<td>'.$details.'</td> 
   				<td><a href="./clientarea.php?action=edit_invoice&amp;id='.$id.'"><img src="./member/images/icn_edit.png" title="Edit Item" alt="Edit" /></a>&nbsp; &nbsp; &nbsp; <a href="./clientarea.php?action=delete_invoice&amp;id='.$id.'"><img src="./member/images/icn_trash.png" title="Delete Item" alt="Delete" /></a></td> 
				<td style="text-align: right;">Rp '.$price.'</td> 
    		</tr>';
		$total = $total + $price;
    }
	$total = $total + $id;
	$payments_details = $payments_details.' = Rp '.($total);
?>
			<tr style="background-color:#ddd">
            	<td colspan="4" style="text-align: right;">Biaya Kode Unik :</td>
                <td style="text-align: right;"> Rp <?php echo $id ?>.00</td>
            </tr> 
            <tr style="background-color:#ddf">
            	<td colspan="4" style="font-weight: bold; text-align: right;">TOTAL YANG HARUS DIBAYAR :</td>
                <td style="text-align: right; font-weight: bold; "> Rp <?php echo $total; ?>.00</td>
            </tr>            
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>Invoice</th> 
    				<th>Payment</th> 
    				<th>Tanggal</th> 
    				<th>Keterangan</th>                     
    				<th>Harga</th> 
    			</tr> 
			</thead> 
			<tbody>
<?php
	$stmt = $mysqli->prepare("SELECT id, payment_id, create_date, price, details FROM invoices where ((member_id = ?) and (status = 'Y')) ORDER by create_date");
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($id, $payment_id, $create_date, $price, $details);
	
	while ($stmt->fetch()) {		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>#'.$payment_id.'</td> 
  				<td>'.$create_date.'</td> 
   				<td>'.$details.'</td> 
   				<td style="text-align: right;">Rp '.$price.'</td> 
    		</tr>';
    }
?>           
            </tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div>
<?php
if ((!empty($total)) or ($total > 0))
	echo '	<form action="'.esc_url($_SERVER['PHP_SELF']).'?action=payments&amp;id=add" method="post" >	
            <input type="hidden" value="'.$total.'" name="price" />		
        	<input type="hidden" value="buy_from_product" name="reason" />		
        	<input type="hidden" value="'.$payments_details.'" name="details" />		
        	<footer>
				<div class="submit_link">
					<input type="submit" value="Konfirmasi Pembayaran" class="alt_btn">
				</div>
			</footer>
            </form>';
?>        
        	
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