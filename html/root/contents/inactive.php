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
    	<header><h3 class="tabs_involved">Daftar Member Tidak Aktif (Tidak ada Referral dan Akun)</h3>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>Member ID</th>
                    <th>Email</th> 
    				<th>Username</th> 
    				<th>Tanggal Pendaftaran</th>
                    <th align="center">Action</th>     				  
				</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	
	$stmt = $mysqli->prepare("SELECT id, email, username, timestamp FROM (SELECT c.id, c.email, c.username, c.timestamp, max(c.total_referral) as total_referral, count(d.id) as total_account FROM (SELECT a.id, a.email, a.username, a.timestamp, count(b.email) as total_referral from members a left join members b on a.email = b.reff_id group by a.id, a.email, a.username) as c left join accounts d on c.id = d.member_id group by c.id, c.email, c.username) as sub where total_referral < 1 and total_account < 1"); 
	
	$stmt->execute();
	$stmt->bind_result($temp_id, $temp_email, $temp_username, $temp_timestamp);

	while ($stmt->fetch()) {
		if($temp_email == "1") { $temp_email = "Tanpa Referral"; $temp_total_price = 0; }
		echo '	<tr> 
 				<td>#'.$temp_id.'</td> 
				<td>'.$temp_email.'</td> 
  				<td>'.$temp_username.'</td> 
   				<td>'.$temp_timestamp.'</td> 
				<td align="center">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=edit_member&amp;id='.$temp_id.'" >&nbsp;<img src="./images/icn_edit_article.png" title="Edit" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=delete&amp;id='.$temp_id.'\')" >&nbsp;<img src="./images/icn_trash.png" title="Delete" alt="Delete" />&nbsp;</a> 
				</td> 
			</tr>'; 
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