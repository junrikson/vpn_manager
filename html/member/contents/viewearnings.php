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
    <article class="module width_full">
    	<header><h3 class="tabs_involved">Transaksi dari Referral anda :</h3>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>No</th> 
    				<th>Tanggal</th> 
    				<th>Referral</th> 
    				<th>Keterangan</th> 
    				<th align="center">Jumlah</th>     				  
				</tr> 
			</thead> 
			<tbody>
<?php
	$i = 1;
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		
	$stmt = $mysqli->prepare("SELECT a.payment_date, b.email, ROUND(a.price * 0.4) FROM payments a left join members b on a.member_id = b.id left join members c on b.reff_id = c.email WHERE ((a.status = 'Y') and (c.id = ?) and (a.reason = 'buy_from_product'))"); 
	
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($payment_date, $email, $harga);

	$reason = "Pembelian akun VPN / SSH";	
	while ($stmt->fetch()) {
		echo '	<tr> 
 				<td>'.$i.'.</td> 
  				<td>'.$payment_date.'</td> 
   				<td>'.$email.'</td> 
				<td>'.$reason.'</td>
				<td align="right">Rp '.$harga.'</td>  
			</tr>'; 
		$i++;
    }
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