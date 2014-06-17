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
   					<th>Email</th>
                    <th align="center">Member ID</th> 
    				<th>Username</th> 
    				<th align="center">Jumlah Referral</th>
                    <th align="center">Saldo Referral</th>     				  
				</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$total = 0;
	
	$stmt = $mysqli->prepare("SELECT max(a.id), max(a.username), b.reff_id, count(b.email) as total_referral, sum(ROUND(if((c.status = 'Y' && c.reason = 'buy_from_product'),c.price * 0.4,0))) as total from members a right join members b on a.email = b.reff_id left join payments c on b.id = c.member_id group by b.reff_id"); 
	
	$stmt->execute();
	$stmt->bind_result($temp_id, $temp_username, $temp_email, $temp_total_referral, $temp_total_price);

	while ($stmt->fetch()) {
		if($temp_email == "1") { $temp_email = "Tanpa Referral"; $temp_total_price = 0; }
		echo '	<tr> 
 				<td>'.$temp_email.'</td> 
				<td align="center">'.$temp_id.'</td> 
  				<td>'.$temp_username.'</td> 
   				<td align="center">'.$temp_total_referral.'</td> 
				<td align="right">Rp '.$temp_total_price.'</td> 
			</tr>'; 
		$total = $total + $temp_total_price;
    }	echo '
			<tr> 
 				<td colspan = "4" align="center" bgcolor="#DDD" style="font-weight: bold;">TOTAL</td> 
				<td align="right" bgcolor="#DDD" style="font-weight: bold;">Rp '.$total.'</td> 
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