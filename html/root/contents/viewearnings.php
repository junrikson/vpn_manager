<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}

function init_user_id($status, $member_id){
if (!empty($member_id)) :
	if ($status == 'success'){
		echo '<h4 class="alert_success">Pemesanan sukses! Silahkan tunggu untuk aktivasi akun anda atau hubungi salah satu kontak yang tersedia.</h4>';	
	}	
?>	    
    <div class="clear"></div>
    <article class="module width_full">
    	<header><h3 class="tabs_involved">Daftar Referral</h3>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>Payment ID</th> 
    				<th>Tanggal</th> 
    				<th>Alasan</th>                     
    				<th>Keterangan</th>                     
					<th align="center">Harga</th>
                    <th align="center">Saldo</th>
    			</tr>  
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$saldo = 0;
	$range = 20;	
	$total_payment = 0;
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM payments WHERE status = 'Y'");
	$stmt->execute();
	$stmt->bind_result($temp);
	
	while ($stmt->fetch()) {
		$total_payment = $temp;
    }
	
	if($total_payment > $range){
		$stmt = $mysqli->prepare("SELECT sum(price) FROM (SELECT price FROM payments WHERE status = 'Y' ORDER BY id asc LIMIT ".($total_payment - $range).") AS sub");
		$stmt->execute();
		$stmt->bind_result($temp);
	
		while ($stmt->fetch()) {
			$saldo = $temp;
    	}
	}
	
	$stmt = $mysqli->prepare("SELECT * FROM (SELECT id, payment_date, reason, details, price FROM payments WHERE status = 'Y' ORDER BY id desc LIMIT ".$range.") sub ORDER BY id asc");
	$stmt->execute();
	$stmt->bind_result($id, $payment_date, $reason, $details, $price );
	
	echo '
				<tr> 
   					<td colspan="5" align="center" style="font-weight: bold;" bgcolor="#DDD">SALDO AWAL</td>
                    <td align="right" style="font-weight: bold;" bgcolor="#DDD">Rp '.$saldo.'</td>
    			</tr>';  
	while ($stmt->fetch()) {
		$saldo = $saldo + $price;if($reason == "others") { $reason = "Lainnya"; }
		elseif($reason == "buy_from_product") { $reason = "Pembelian Akun"; }
		elseif($reason == "withdraw") { $reason = "Withdraw"; }
		echo '	<tr> 
 				<td>#'.$id.'</td> 
  				<td>'.$payment_date.'</td> 
   				<td>'.$reason.'</td> 
   				<td>'.$details.'</td>    				
				<td style="text-align: right;">Rp '.$price.'</td>
				<td style="text-align: right;">Rp '.$saldo.'</td>				 
    		</tr>';
    }
	echo '
				<tr> 
   					<td colspan="5" align="center" style="font-weight: bold;" bgcolor="#DDD">SALDO AKHIR</td>
                    <td align="right" style="font-weight: bold;" bgcolor="#DDD">Rp '.$saldo.'</td>
    			</tr>'; 
?>          
            </tbody> 
			</table>
			</div><!-- end of #tab1 -->
     	</div>
	</article>
			
			
            <br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>

<?php
    /* close statement */
    $stmt->close();

			
endif; } ?>		