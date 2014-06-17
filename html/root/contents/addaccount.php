<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}

function init_user_id($status, $member_id){	
if (!empty($member_id)) :
	if ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'duplicate'){
		echo '<h4 class="alert_error">Username telah digunakan! Coba ganti dengan username lain.</h4>';	
	}
	elseif ($status == 'max'){
		echo '<h4 class="alert_error">5 akun anda masih dalam keadaan pending. Mohon tunggu aktivasi atau hubungi salah satu kontak yang tersedia.</h4>';	
	}
?>

<article class="module width_full">
			<form action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>?action=addaccount" method="post" >
			<header><h3>Add New Account</h3></header>
            <div style="text-align:left; font-weight:bold; margin: 10px 20px;">Cara Pemesanan :</div>
            <ol type="1">
            <li>Masukkan username dan password yang anda kehendaki, ini yang nantinya digunakan untuk login pada aplikasi VPNku.</li>
            <li>Pilih jenis akun yang anda kehendaki. Pilih Trial jika ingin mencoba terlebih dahulu. Trial hanya satu server, server lainnya akan diaktifkan apabila telah melakukan pembayaran.</li>
            <li>Tekan tombol Submit jika semua informasi sudah diisi.</li>
            <li>Tunggu sampai akun anda diaktifkan oleh Tim kami. Normal pengaktifan akun adalah 10 menit sampai 24 jam. Jika dalam waktu lebih dari 24 jam akun anda masih dalam keadaan <span style="font-weight:bold; color: #F70;">PENDING</span>, hubungi salah satu kontak yang tersedia. Cek status akun pada <a href="clientarea.php?action=viewaccounts">View Accounts</a> di sebelah kiri menu.</li>
            </ol>
				<div class="module_content">
                		<fieldset style="width:48%; float:left; margin-right: 3%;">
							<label>Username</label>
							<input type="text" style="width:92%;" name="username">
						</fieldset>
                        <fieldset style="width:48%; float:left;">
                            <label>Password</label>
							<input type="text" style="width:92%;" name="password">
						</fieldset>
						<fieldset style="width:99%; float:left; margin-right: 3%;">
							<label>Jenis Akun</label>
							<select style="width:92%;" name="details">
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	$ratio = 1;
	$stmt = $mysqli->prepare('SELECT ratio FROM members where id = '.$member_id); 	
	$stmt->execute();
	$stmt->bind_result($temp);
	while ($stmt->fetch()) {
		$ratio = $temp;
    }
		
	$stmt = $mysqli->prepare("SELECT name, price FROM products ORDER by price");	
	$stmt->execute();
	$stmt->bind_result($name, $price);
	$i = 1;
	while ($stmt->fetch()) {
		$price = $price * $ratio;    
		if($i == 1){
			echo '
								<option value="'.$name.' = Rp '.$price.'" selected="selected">'.$name.' = Rp '.$price.'</option>';
		}
		else{
			echo '
								<option value="'.$name.' = Rp '.$price.'">'.$name.' = Rp '.$price.'</option>';		
		}
		$i++;
    }
?>								                               
							</select>
						</fieldset>	
				<div class="clear"></div>				
				</div>
			<footer>
				<div class="submit_link">
					<input type="submit" value="Submit" class="alt_btn">
				</div>
			</footer>
            </form>              
		</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>&nbsp;    
<?php endif; } ?>		