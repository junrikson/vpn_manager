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
<div style="text-align:left; margin: 10px 32px; text-align:justify;">Untuk melakukan pembayaran atau perpanjangan akun klik Gambar keranjang pada Actions Menu di bawah. Jika anda hanya <span style="font-weight: bold; color: #F70;">TRIAL</span> (mencoba akun) tidak perlu membuka pembayaran, tunggu status <span style="font-weight: bold; color: #F70;">PENDING</span> anda menjadi <span style="font-weight: bold; color: #070;">ACTIVE</span> dan akun anda siap digunakan. Pengaktifan akun dilakukan secara manual oleh staff kami yang berkisar 10 Menit sampai 24 Jam. Jika dalam waktu lebih dari 24 Jam akun anda belum aktif, silahkan hubungi salah satu kontak yang tersedia. Lama <span style="font-weight: bold; color: #F70;">TRIAL</span> adalah 4 - 30 Jam dan akan <span style="font-weight: bold; color: #F00;">EXPIRED</span> dengan sendirinya jika tidak dilakukan pembayaran.</div>
	<article class="module width_full">
    	<header><h3 class="tabs_involved">Your <?php echo PRODUCT_NAME; ?> Accounts</h3>
		<ul class="tabs">
   			<li><a href="#tab1">Active</a></li>
    		<li><a href="#tab2">Expired</a></li>
		</ul>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>No</th> 
    				<th>Username</th> 
    				<th>Password</th> 
    				<th>Expired Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th>Actions</th>  
				</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$i = 1;
		
	$stmt = $mysqli->prepare("SELECT id, username, password, expired, status FROM accounts where (( member_id = ? ) and ((status = 'Y') or (status = 'N') or (status = 'T'))) ORDER by username"); 
	
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($id, $username, $password, $expired, $status);

	function selisih($date1, $date2){
		$selisih = $date2 - $date1;
		$diff = strtotime($date2) - strtotime($date1);
		$days = floor($diff / 86400);
		return ($days);
	}
    /* fetch values */
    while ($stmt->fetch()) {
		$exp_days = selisih(date("Y-m-d"), $expired);
		$pay = "Bayar";
		
		if($status == 'N'){ 
			$status = $expired = $details = '<div style="font-weight: bold; color: #F70;">PENDING</div>'; 
		}
		elseif($status == 'Y'){ 
			$status = '<div style="font-weight: bold; color: #070;">ACTIVE</div>';
			$pay = "Perpanjang";
			if($exp_days < 5){
				$details = '<div style="color: #F00;">Expired Soon</div>'; 
			}
			else { $details = $exp_days.' days left'; }
		}
		elseif($status == 'T'){ 
			$status = '<div style="font-weight: bold; color: #070;">ACTIVE</div>'; 
			$details = $expired = '<div style="font-weight: bold; color: #F70;">TRIAL</div>'; 
		}
		echo '	<tr> 
 				<td>'.$i.'.</td> 
  				<td>'.$username.'</td> 
   				<td>'.$password.'</td> 
    			<td>'.$expired.'</td> 
   				<td>'.$status.'</td> 
   				<td>'.$details.'</td> 
   				<td><a href="./clientarea.php?action=invoices&amp;id='.$id.'"><img src="./member/images/cart.png" title="Bayar" />'.$pay.'</a></td> 
			</tr>'; 
		$i++;
    }
?>

			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>No</th> 
    				<th>Username</th> 
    				<th>Expired Date</th>
                    <th>Password</th> 
    				<th>Status</th>
                    <th>Actions</th> 
				</tr> 
			</thead> 
			<tbody>
<?php
	$stmt = $mysqli->prepare("SELECT id, username, password, expired, details, status FROM accounts where (( member_id = ? ) and (status = 'E')) ORDER by username"); 
	$stmt->bind_param("s", $mysqli->real_escape_string($member_id));
    $stmt->execute();
	$stmt->bind_result($id, $username, $password, $expired, $details, $status);
	
	$i = 1;
	while ($stmt->fetch()) {
		if($status == 'E'){
			$status = '<div style="font-weight: bold; color: #F00;">EXPIRED</div>'; 
			echo '	<tr> 
   					<td>'.$i.'.</td> 
    				<td>'.$username.'</td> 
    				<td>'.$expired.'</td> 
    				<td>'.$password.'</td> 
    				<td>'.$status.'</td> 
    				<td><a href="./clientarea.php?action=invoices&amp;id='.$id.'"><img src="./member/images/cart.png" title="Bayar" />Perpanjang</a></td> 
				</tr>'; 
			$i++;
		}
    }
?>           
            
            </tbody> 
			</table>

			</div><!-- end of #tab2 -->
			
		</div>
	</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>

<?php
    /* close statement */
    $stmt->close();

			
endif; } ?>		