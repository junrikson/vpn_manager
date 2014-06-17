<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}

function init_user_id($status, $member_id, $id){
if (!empty($member_id)) :
	if ($status == 'success'){
		echo '<h4 class="alert_success">Pemesanan sukses! Silahkan tunggu untuk aktivasi akun anda atau hubungi salah satu kontak yang tersedia.</h4>';	
	}
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$total = 0;
	$stmt = $mysqli->prepare("SELECT sum(ROUND(a.price * ( 1 - c.ratio))) as total FROM payments a left join members b on a.member_id = b.id left join members c on b.reff_id = c.email WHERE ((a.status = 'Y') and (c.id = ?) and (a.reason = 'buy_from_product')) "); 	
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($temp);

	while ($stmt->fetch()) {
		$total = $temp;
    }
	if($total < 50000){
		echo '<h4 class="alert_error">Maaf, saldo anda belum mencukupi untuk melakukan penarikan.</h4>';
	}    
?>
				
	<article class="module width_3_quarter">
		<header><h3>Your Referral Code :</h3></header>
    	<p style="font-weight:bold; margin-left: 20px">Bagikan link referral ini ke teman-teman anda. Komisi sebesar 40 % dari setiap pembelian akun <?php echo PRODUCT_NAME; ?> melalui link anda yang dapat diwithdraw via Bank. Anda dapat melakukan withdraw ketika saldo Referral anda sudah mencapai Rp 50.000,-. Penarikan dapat dilakukan via Bank BCA dan BNI. Penarikan di luar bank itu akan dikenakan potongan ATM Bersama.</p>
	<div class="module_content">
		<fieldset>
			<input type="text" readonly="readonly" value="<?php echo HOMEPAGE.'index.php?r='.$member_id; ?>">
		</fieldset>
	</div>					
	</article>
    
	<article class="module width_quarter">
		<header><h3>Saldo Referral</h3></header>
    	<p style="font-weight:bold; color: #5A5; font-size:30px; text-align:center; margin:30px 0 30px 0;">Rp <?php echo $total; ?></p>
	</article>'
    <div class="clear"></div>	
<?php endif; } ?>	