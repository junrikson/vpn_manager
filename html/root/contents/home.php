<?php
if(!defined('MyConst2')) {
   die('Go Away!');
}
function init_user_id($status, $user_id){
if (!empty($user_id)) :
	$pending_payment = 0;
	$pending_account = 0;
	$pending_withdraw = 0;
	$account_active = 0;
	$account_trial = 0;
	$account_expired = 0;
	$total_accounts = 0;
	$total_members = 0;
	
	$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM accounts WHERE STATUS = 'N'");	
	$stmt->execute();
	$stmt->bind_result($pending_account);

	while ($stmt->fetch()) {
		$pending_account = $pending_account;
    }
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM payments WHERE STATUS = 'N'");	
	$stmt->execute();
	$stmt->bind_result($pending_payment);

	while ($stmt->fetch()) {
		$pending_payment = $pending_payment;
    }
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM accounts WHERE STATUS = 'Y'");	
	$stmt->execute();
	$stmt->bind_result($account_active);

	while ($stmt->fetch()) {
		$account_active = $account_active;
    }
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM accounts WHERE STATUS = 'T'");	
	$stmt->execute();
	$stmt->bind_result($account_trial);

	while ($stmt->fetch()) {
		$account_trial = $account_trial;
    }
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM accounts WHERE STATUS = 'E'");	
	$stmt->execute();
	$stmt->bind_result($account_expired);

	while ($stmt->fetch()) {
		$account_expired = $account_expired;
    }
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM members");	
	$stmt->execute();
	$stmt->bind_result($total_members);

	while ($stmt->fetch()) {
		$total_members = $total_members;
    }
	
	$stmt = $mysqli->prepare("SELECT COUNT(*) FROM accounts");	
	$stmt->execute();
	$stmt->bind_result($total_accounts);

	while ($stmt->fetch()) {
		$total_accounts = $total_accounts;
    }
?>

<h4 class="alert_info">Selamat datang di Admin Control Panel</h4>
		<article class="module width_full">
			<header><h3>Stats</h3></header>
			<div class="module_content">				
				<article class="stats_overview">
					<div class="overview_today">
						<p class="overview_day">Pending</p>
						<p class="overview_count"><a href="./index.php?action=viewaccounts" style="color: #F00"><?php echo $pending_account; ?></a></p>
						<p class="overview_type">Accounts</p>
						<p class="overview_count"><a href="./index.php?action=payments" style="color: #F00"><?php echo $pending_payment; ?></a></p>
						<p class="overview_type">Payments</p>
                        <p class="overview_count"><a href="./index.php?action=viewreferrals" style="color: #F00"><?php echo $pending_withdraw; ?></a></p>
						<p class="overview_type">Withdraws</p>
					</div>
					<div class="overview_today">
						<p class="overview_day">Account</p>
						<p class="overview_count"><?php echo $account_active; ?></p>
						<p class="overview_type">Active</p>
						<p class="overview_count"><?php echo $account_trial; ?></p>
						<p class="overview_type">Trial</p>
                        <p class="overview_count"><?php echo $account_expired; ?></p>
						<p class="overview_type">Expired</p>
					</div>
                    <div class="overview_previous">
						<p class="overview_day">TOTAL</p>
						<p class="overview_count"><?php echo $total_members; ?></p>
						<p class="overview_type">Members</p>
						<p class="overview_count"><?php echo $total_accounts; ?></p>
						<p class="overview_type">Accounts</p>
					</div>                   
				</article>
                <div class="clear"></div>				
			</div>            	
		</article>    

<?php endif; } ?>
		
		