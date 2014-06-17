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
if (!empty($member_id)) :
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);

?>	
	
<article class="module width_full">
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
   					<th>Invoice ID</th> 
    				<th>Tanggal</th> 
    				<th>Member ID</th> 
    				<th>Account Name</th> 
    				<th>Product Name</th> 
    				<th>Harga</th>
                    <th>Actions</th>
    			</tr> 
			</thead> 
			<tbody>
<?php
	
	$stmt = $mysqli->prepare("SELECT a.create_date, b.email, a.id, a.account_name, a.product_name, a.details, a.price FROM invoices a
LEFT JOIN members b ON a.member_id = b.id WHERE a.status = 'N' ORDER BY a.create_date DESC");
	$stmt->execute();
	$stmt->bind_result($create_date, $member_id, $id, $account_name, $product_name, $details, $price);
	$stmt->store_result();            	
	while ($stmt->fetch()) {		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$create_date.'</td> 
   				<td>'.$member_id.'</td> 
   				<td>'.$account_name.'</td> 
   				<td>'.$product_name.'</td> 
   				<td style="text-align: right;">Rp '.$price.'</td>
				<td><a href="./index.php?action=edit_invoice&amp;id='.$id.'"><img src="./images/icn_edit.png" title="Edit Item" alt="Edit" /></a>&nbsp; &nbsp; &nbsp; <a href="./index.php?action=delete_invoice&amp;id='.$id.'"><img src="./images/icn_trash.png" title="Delete Item" alt="Delete" /></a></td>  
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
   				<th>Invoice ID</th> 
    				<th>Payment ID</th> 
    				<th>Tanggal</th> 
    				<th>Member ID</th> 
    				<th>Account Name</th> 
    				<th>Product Name</th> 
    				<th>Harga</th>
                    <th>Actions</th>
    			</tr> 
			</thead> 
			<tbody>
<?php
	
	$stmt = $mysqli->prepare("SELECT a.create_date, b.email, a.payment_id, a.id, a.account_name, a.product_name, a.price FROM invoices a
LEFT JOIN members b ON a.member_id = b.id WHERE a.status = 'Y' ORDER BY a.create_date DESC");
	$stmt->execute();
	$stmt->bind_result($create_date, $member_id, $payment_id, $id, $account_name, $product_name, $price);
	
	while ($stmt->fetch()) {		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>#'.$payment_id.'</td> 
  				<td>'.$create_date.'</td> 
   				<td>'.$member_id.'</td> 
   				<td>'.$account_name.'</td> 
   				<td>'.$product_name.'</td> 
   				<td style="text-align: right;">Rp '.$price.'</td>
				<td><a href="./index.php?action=edit_invoice&amp;id='.$id.'"><img src="./images/icn_edit.png" title="Edit Item" alt="Edit" /></a>&nbsp; &nbsp; &nbsp; <a href="./index.php?action=delete_invoice&amp;id='.$id.'"><img src="./images/icn_trash.png" title="Delete Item" alt="Delete" /></a></td>  
    		</tr>';
    }
?>        
            </tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div> 	
	</article>   

<?php 
$stmt->close();
endif; 

} ?>		