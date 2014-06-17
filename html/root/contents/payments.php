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
	elseif ($status == 'command_success'){
		echo '<h4 class="alert_success">Perubahan payment sukses!</h4>';	
	}
}

function init_user_id($command, $status, $member_id, $id){
if (!empty($member_id)) : 
if((!empty($command)) and (!empty($id))){
		$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		if($command == "activate"){
			$id = $mysqli->real_escape_string($id);
 			$temp = 'Y';
			if ($update_stmt = $mysqli->prepare("UPDATE payments SET status = ? WHERE id = ?")) {
				$update_stmt->bind_param('ss', $temp, $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
		elseif($command == "disable"){
			$id = $mysqli->real_escape_string($id);
 			$temp = 'N';
			if ($update_stmt = $mysqli->prepare("UPDATE payments SET status = ? WHERE id = ?")) {
				$update_stmt->bind_param('ss', $temp, $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
		elseif($command == "delete"){
			$id = $mysqli->real_escape_string($id);
 			if ($update_stmt = $mysqli->prepare("DELETE from payments WHERE id = ?")) {
				$update_stmt->bind_param('s', $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
	}
	
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
?>
		
<article class="module width_full">
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
   					<th>Payment ID</th> 
    				<th>Tanggal</th> 
    				<th>Member ID</th> 
    				<th>Bank</th>                     
    				<th>Pengirim</th>                     
    				<th>Keterangan</th>                     
					<th>Harga</th>
                    <th style="text-align: center;">Actions</th>
    			</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		
	$stmt = $mysqli->prepare("SELECT a.id, b.email, a.payment_date, a.bank, a.sender, a.details, a.price FROM payments a left join members b on a.member_id = b.id where a.status = 'N' ORDER by a.payment_date desc");
	$stmt->execute();
	$stmt->bind_result($id, $member_id, $payment_date, $bank, $sender, $details, $price );
	
	while ($stmt->fetch()) {		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$payment_date.'</td> 
   				<td>'.$member_id.'</td> 
  				<td>'.$bank.'</td> 
   				<td>'.$sender.'</td> 
   				<td>'.$details.'</td>    				
				<td style="text-align: right;">Rp '.$price.'</td>
				<td style="text-align: center;">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=payments&amp;command=activate&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_success.png" title="Activate" alt="Activate" />&nbsp;</a>
				<a href="./index.php?action=edit_payment&id='.$id.'">&nbsp;<img src="./images/icn_edit.png" title="Edit Item" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=payments&amp;command=delete&amp;id='.$id.'\')">&nbsp;<img src="./images/icn_trash.png" title="Delete Item" alt="Delete" />&nbsp;</a>
				</td>  
    		</tr>';
		$mysqli2 = new mysqli(HOST, USER, PASSWORD, DATABASE);		
		$stmt2 = $mysqli2->prepare("SELECT a.account_name, a.product_name FROM invoices a LEFT JOIN members b ON a.member_id = b.id WHERE a.status = 'Y' and a.payment_id = ".$id." ORDER BY a.create_date DESC");
		$stmt2->execute();
		$stmt2->bind_result($account_name, $product_name);
		$stmt2->store_result();            	
		while ($stmt2->fetch()) {		
			echo '	<tr> 
				<td style="background-color: #DDD" align="right"> ~ </td> 
 				<td colspan="7" align="left" style="background-color: #DDD">'.$account_name.' ( '.$product_name.' )</td>  				
    		</tr>';
    	}
    }
?>
			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>Payment ID</th> 
    				<th>Tanggal</th> 
    				<th>Member ID</th> 
    				<th>Bank</th>                     
    				<th>Keterangan</th>                     
					<th>Harga</th>
                    <th style="text-align: center;">Actions</th>
    			</tr>  
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		
	$stmt = $mysqli->prepare("SELECT a.id, b.email, a.payment_date, a.bank, a.details, a.price FROM payments a left join members b on a.member_id = b.id where a.status = 'Y' ORDER by a.payment_date desc");
	$stmt->execute();
	$stmt->bind_result($id, $member_id, $payment_date, $bank, $details, $price );
	
	while ($stmt->fetch()) {
		
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$payment_date.'</td> 
   				<td>'.$member_id.'</td> 
  				<td>'.$bank.'</td> 
   				<td>'.$details.'</td>    				
				<td style="text-align: right;">Rp '.$price.'</td>
				<td style="text-align: center;">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=payments&amp;command=disable&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_error.png" title="Disable" alt="Disable" />&nbsp;</a>
				<a href="./index.php?action=edit_payment&id='.$id.'">&nbsp;<img src="./images/icn_edit.png" title="Edit Item" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=payments&amp;command=delete&amp;id='.$id.'\')">&nbsp;<img src="./images/icn_trash.png" title="Delete Item" alt="Delete" />&nbsp;</a>
				</td>  
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