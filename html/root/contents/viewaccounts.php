<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}

function init_user_id($command, $status, $member_id, $id){
if (!empty($member_id)) :
	if((!empty($command)) and (!empty($id))){
		$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
		if($command == "activate"){
			$id = $mysqli->real_escape_string($id);
 			$temp = 'Y';
			if ($update_stmt = $mysqli->prepare("UPDATE accounts SET status = ? WHERE id = ?")) {
				$update_stmt->bind_param('ss', $temp, $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
		elseif($command == "trial"){
			$id = $mysqli->real_escape_string($id);
 			$temp = 'T';
			if ($update_stmt = $mysqli->prepare("UPDATE accounts SET status = ? WHERE id = ?")) {
				$update_stmt->bind_param('ss', $temp, $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
		elseif($command == "disable"){
			$id = $mysqli->real_escape_string($id);
 			$temp = 'E';
			if ($update_stmt = $mysqli->prepare("UPDATE accounts SET status = ? WHERE id = ?")) {
				$update_stmt->bind_param('ss', $temp, $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
		elseif($command == "reset"){
			$id = $mysqli->real_escape_string($id);
 			$temp = 'Kosong';
			if ($update_stmt = $mysqli->prepare("UPDATE accounts SET hwid = ? WHERE id = ?")) {
				$update_stmt->bind_param('ss', $temp, $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
		elseif($command == "delete"){
			$id = $mysqli->real_escape_string($id);
 			if ($update_stmt = $mysqli->prepare("DELETE from accounts WHERE id = ?")) {
				$update_stmt->bind_param('s', $id);
				if (! $update_stmt->execute()) {
					$status = 'error';
   	  			}
			}
			$status = 'command_success';
		}
	}
	if ($status == 'success'){
		echo '<h4 class="alert_success">Penambahan akun sukses!</h4>';	
	}
	elseif ($status == 'error'){
		echo '<h4 class="alert_error">Terjadi kesalahan pada system! Hubungi salah satu kontak yang tersedia.</h4>';	
	}
	elseif ($status == 'command_success'){
		echo '<h4 class="alert_success">Perubahan akun sukses!</h4>';	
	}
?>
	<article class="module width_full">
    	<h3 class="tabs_involved">Management SSH Users</h3>
        <iframe src="./ssh/lib.php" width="95%" height="120px" frameborder="0" style="margin-left: 15px; margin-top: 5px;"></iframe>
    </article>
	<article class="module width_full">
    	<header><h3 class="tabs_involved">Daftar Akun <?php echo PRODUCT_NAME; ?></h3>
		<ul class="tabs">
   			<li><a href="#tab1">Pending</a></li>
    		<li><a href="#tab2">Active</a></li>
    		<li><a href="#tab3">Expired</a></li>
		</ul>
		</header>
        
        <div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   				<th>Member ID</th> 
    				<th>Username</th> 
    				<th>Password</th> 
    				<th>Expired Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th style="text-align: center;">Actions</th>  
				</tr> 
			</thead> 
			<tbody>
<?php
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$i = 1;
		
	$stmt = $mysqli->prepare("SELECT a.id, b.email, a.username, a.password, a.expired, a.details, a.status FROM accounts a left join members b on a.member_id = b.id where ((a.status = 'N') or (a.status = 'T')) ORDER by a.expired desc"); 
	
	$stmt->execute();
	$stmt->bind_result($id, $member_id, $username, $password, $expired, $details, $status);

	/* fetch values */
    while ($stmt->fetch()) {
		if($status == 'N'){ 
			$status = '<div style="font-weight: bold; color: #F70;">PENDING</div>'; 
		}
		elseif($status == 'T'){ 
			$status = '<div style="font-weight: bold; color: #F70;">TRIAL</div>'; 
		}
		echo '<tr> 
 				<td>'.$member_id.'</td> 
  				<td>'.$username.'</td> 
   				<td>'.$password.'</td> 
   				<td>'.$expired.'</td> 
   				<td>'.$status.'</td> 
   				<td>'.$details.'</td> 
   				<td style="font-weight: bold; text-align: center;">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=activate&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_success.png" title="Activate" alt="Activate" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=trial&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_warning.png" title="Trial" alt="Trial" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=disable&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_error.png" title="Disable" alt="Disable" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=reset&amp;id='.$id.'" >&nbsp;<img src="./images/icn_settings.png" title="Reset" alt="Reset" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=edit_account&amp;id='.$id.'" >&nbsp;<img src="./images/icn_edit_article.png" title="Edit" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=delete&amp;id='.$id.'\')" >&nbsp;<img src="./images/icn_trash.png" title="Delete" alt="Delete" />&nbsp;</a>
				</td> 
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
   					<th>Member ID</th> 
    				<th>Username</th> 
    				<th>Password</th> 
    				<th>Expired Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th style="text-align: center;">Actions</th>  
				</tr> 
			</thead> 
			<tbody>
<?php
	$i = 1;
		
	$stmt = $mysqli->prepare("SELECT a.id, b.email, a.username, a.password, a.expired, a.details, a.status FROM accounts a left join members b on a.member_id = b.id where a.status = 'Y' ORDER by a.expired desc"); 
	
	$stmt->execute();
	$stmt->bind_result($id, $member_id, $username, $password, $expired, $details, $status);

	/* fetch values */
    while ($stmt->fetch()) {
		$status = '<div style="font-weight: bold; color: #070;">ACTIVE</div>';
		echo '<tr> 
 				<td>'.$member_id.'</td> 
  				<td>'.$username.'</td> 
   				<td>'.$password.'</td> 
   				<td>'.$expired.'</td> 
   				<td>'.$status.'</td> 
   				<td>'.$details.'</td> 
   				<td style="font-weight: bold; text-align: center;">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=trial&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_warning.png" title="Trial" alt="Trial" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=disable&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_error.png" title="Disable" alt="Disable" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=reset&amp;id='.$id.'" >&nbsp;<img src="./images/icn_settings.png" title="Reset" alt="Reset" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=edit_account&amp;id='.$id.'" >&nbsp;<img src="./images/icn_edit_article.png" title="Edit" alt="Edit" />&nbsp;</a>
				</td> 
			</tr>'; 
		$i++;
    }
?>

			</tbody> 
			</table>
			</div><!-- end of #tab1 -->
			
			<div id="tab3" class="tab_content">
			<table class="tablesorter" cellspacing="0"> 
			<thead> 
				<tr> 
   				<th>Member ID</th> 
    				<th>Username</th> 
    				<th>Password</th> 
    				<th>Expired Date</th>
                    <th>Status</th>
                    <th>Details</th>
                    <th style="text-align: center;">Actions</th>  
				</tr> 
			</thead> 
			<tbody>
<?php
	$stmt = $mysqli->prepare("SELECT a.id, b.email, a.username, a.password, a.expired, a.details, a.status FROM accounts a left join members b on a.member_id = b.id where a.status = 'E' ORDER by a.expired desc"); 
	
	$stmt->execute();
	$stmt->bind_result($id, $member_id, $username, $password, $expired, $details, $status);

	$i = 1;
	while ($stmt->fetch()) {
		if($status == 'E'){
			$status = '<div style="font-weight: bold; color: #F00;">EXPIRED</div>'; 
			echo '<tr> 
 				<td>'.$member_id.'</td> 
  				<td>'.$username.'</td> 
   				<td>'.$password.'</td> 
   				<td>'.$expired.'</td> 
   				<td>'.$status.'</td> 
   				<td>'.$details.'</td> 
   				<td style="font-weight: bold; text-align: center;">
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=activate&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_success.png" title="Activate" alt="Activate" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=trial&amp;id='.$id.'" >&nbsp;<img src="./images/icn_alert_warning.png" title="Trial" alt="Trial" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=reset&amp;id='.$id.'" >&nbsp;<img src="./images/icn_settings.png" title="Reset" alt="Reset" />&nbsp;</a>
				<a href="'.esc_url($_SERVER['PHP_SELF']).'?action=edit_account&amp;id='.$id.'" >&nbsp;<img src="./images/icn_edit_article.png" title="Edit" alt="Edit" />&nbsp;</a>
				<a href="#" onclick="confirmation(\''.esc_url($_SERVER['PHP_SELF']).'?action=viewaccounts&amp;command=delete&amp;id='.$id.'\')" >&nbsp;<img src="./images/icn_trash.png" title="Delete" alt="Delete" />&nbsp;</a>
				</td> 
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