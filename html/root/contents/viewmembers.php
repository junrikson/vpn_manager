<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}

function init_user_id($command, $status, $member_id, $id){
if (!empty($member_id)) :
	if((!empty($command)) and (!empty($id))){
		$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		if($command == "delete"){
			$id = $mysqli->real_escape_string($id);
 			if ($update_stmt = $mysqli->prepare("DELETE from members WHERE id = ?")) {
				$update_stmt->bind_param('s', $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
	}
	if ($status == 'success'){
		echo '<h4 class="alert_success">Perubahan akun sukses!</h4>';	
	}
	elseif ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'command_success'){
		echo '<h4 class="alert_success">Perubahan akun sukses!</h4>';	
	}
?>
	<article class="module width_full">
    	<header><h3 class="tabs_involved">Daftar Member <?php echo PRODUCT_NAME; ?></h3></header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>ID</th> 
    				<th>Email</th> 
    				<th>Username</th>
                    <th>Ratio</th>
                    <th>Referral ID</th>
                    <th>Referral Ratio</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>  
				</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$i = 1;
		
	$stmt = $mysqli->prepare("SELECT id, ratio, reff_id, reff_ratio, username, email, status FROM members ORDER by id"); 
	
	$stmt->execute();
	$stmt->bind_result($id, $ratio, $reff_id, $reff_ratio, $username, $email, $status);

	/* fetch values */
    while ($stmt->fetch()) {
		echo '<tr> 
 				<td>'.$id.'</td> 
  				<td>'.$email.'</td> 
   				<td>'.$username.'</td> 
   				<td>'.$ratio.'</td> 
   				<td>'.$reff_id.'</td> 
   				<td>'.$reff_ratio.'</td> 
   				<td>'.$status.'</td> 
   				<td style="font-weight: bold; text-align: center;">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=edit_member&amp;id='.$id.'" >&nbsp;<img src="./images/icn_edit_article.png" title="Edit" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=delete&amp;id='.$id.'\')" >&nbsp;<img src="./images/icn_trash.png" title="Delete" alt="Delete" />&nbsp;</a> 
				</td> 
			</tr>'; 
		$i++;
    }
?>

			</tbody> 
			</table>
			</div><!-- end of #tab1 -->   
		</div>
        
        <div class="tab_container">
			<div id="tab2" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   					<th>ID</th> 
    				<th>Email</th> 
    				<th>Username</th>
                    <th>Ratio</th>
                    <th>Referral ID</th>
                    <th>Referral Ratio</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>  
				</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$i = 1;
		
	$stmt = $mysqli->prepare("SELECT id, ratio, reff_id, reff_ratio, username, email, status FROM members ORDER by id"); 
	
	$stmt->execute();
	$stmt->bind_result($id, $ratio, $reff_id, $reff_ratio, $username, $email, $status);

	/* fetch values */
    while ($stmt->fetch()) {
		echo '<tr> 
 				<td>'.$id.'</td> 
  				<td>'.$email.'</td> 
   				<td>'.$username.'</td> 
   				<td>'.$ratio.'</td> 
   				<td>'.$reff_id.'</td> 
   				<td>'.$reff_ratio.'</td> 
   				<td>'.$status.'</td> 
   				<td style="font-weight: bold; text-align: center;"><!--
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=activate&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_success.png" title="Activate" alt="Activate" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=trial&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_warning.png" title="Trial" alt="Trial" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=disable&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_error.png" title="Disable" alt="Disable" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=reset&amp;id='.$id.'" >&nbsp;<img src="./images/icn_settings.png" title="Reset" alt="Reset" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=edit_member&amp;id='.$id.'" >&nbsp;<img src="./images/icn_edit_article.png" title="Edit" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=viewmembers&amp;command=delete&amp;id='.$id.'\')" >&nbsp;<img src="./images/icn_trash.png" title="Delete" alt="Delete" />&nbsp;</a> -->
				</td> 
			</tr>'; 
		$i++;
    }
?>

			</tbody> 
			</table>
			</div><!-- end of #tab1 -->   
		</div>
	</article><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/><br/>&nbsp;<br/>&nbsp;<br/>&nbsp;<br/>

<?php
    /* close statement */
    $stmt->close();

			
endif; } ?>		