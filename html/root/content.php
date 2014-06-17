<?php
if(!defined('MyConst')) {
   die('Go Away!');
}

function init($action, $status, $user_id, $id){	
if (!empty($action)) :	
?>
<!DOCTYPE html>
<html><head> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="description" content="Jasa VPN dan SSH">
	<meta name="keywords" content="VPN, SSH, Instalasi Server, Pembuatan Program, Pembuatan Aplikasi, Hacking Recovery">
	<meta name="author" content="VPNku.net">
	<meta name="robots" content="index, follow">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="icon" href="../images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" media="screen" type="text/css" href="./css/datepicker.css" />
	<script type="text/javascript" src="./js/datepicker.js"></script>
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/datepicker.js"></script>
    <script type="text/javascript" src="./js/eye.js"></script>
    <script type="text/javascript" src="./js/utils.js"></script>
    <script type="text/javascript" src="./js/layout.js?ver=1.0.2"></script>
	<title>VPNku.net - Client Area</title>
	
	<link rel="stylesheet" href="./css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="./js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="./js/hideshow.js" type="text/javascript"></script>
	<script src="./js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
	});

});
    </script>
    <script type="text/javascript">
<!--
function confirmation(lokasi) {
	var answer = confirm("Are you sure?")
	if (answer){
		window.location = lokasi;
	}
	else{
		
	}
}
//-->
</script>
</head>

<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo HOMEPAGE; ?>"><img src="../images/logo.png" alt="" /></a></h1>
			<h2 class="section_title"><?php echo PRODUCT_NAME; ?> Control Panel (BETA)</h2><div class="btn_view_site"><a href="./includes/logout.php">Log Out</a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	
    <section id="secondary_bar">
		<div class="user">
			<p><?php echo htmlentities($_SESSION['username']); ?> (<a href="./includes/logout.php">Log Out</a>)</p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">			  
            <?php
			if($action == 'addaccount'){ 
				echo '<article class="breadcrumbs"><a href="index.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">Add New Account</a></article>';
			}
			elseif($action == 'viewaccounts'){ 
				echo '<article class="breadcrumbs"><a href="index.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">View Accounts</a></article>';
			}
			elseif(($action == 'invoices') or ($action == 'edit_invoice') or ($action == 'delete_invoice')){ 
				echo '<article class="breadcrumbs"><a href="index.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">My Invoices</a></article>';
			}
			elseif($action == 'payments'){ 
				echo '<article class="breadcrumbs"><a href="index.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">My Payments</a></article>';
			}
			
			?>	
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		<form class="quick_search">
			<input type="text" value="Quick Search" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
		</form>
		<hr/>
		<h3>Accounts</h3>
		<ul class="toggle">
			<li class="icn_categories"><a href="index.php">Overview</a></li>
			<li class="icn_add_user"><a href="index.php?action=addaccount">Add New Account</a></li>
            <li class="icn_view_users"><a href="index.php?action=viewaccounts">View Accounts</a></li> 
			<li class="icn_view_users"><a href="index.php?action=viewmembers">View Members</a></li> 
			<li class="icn_view_users"><a href="index.php?action=invoices">Invoices</a></li>
            <li class="icn_view_users"><a href="index.php?action=addpayment">Add New Payment</a></li> 
            <li class="icn_view_users"><a href="index.php?action=payments">Payments</a></li>           
		</ul>
		<h3>Reports</h3>
		<ul class="toggle">
			<li class="icn_view_users"><a href="index.php?action=viewreferrals">Referrals</a></li>
			<li class="icn_folder"><a href="index.php?action=viewearnings">Pendapatan</a></li>
			<li class="icn_photo"><a href="index.php?action=inactive">Inactive</a></li>
		</ul>
		<h3>Profile</h3>
		<ul class="toggle">
			<li class="icn_jump_back"><a href="./includes/logout.php">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2013 <a href="http://www.vpnku.net/">VPNku.net</a></strong></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<section id="main" class="column">
<?php
	if($action == 'default'){ 
		define('MyConst2', TRUE); 
		include_once './contents/home.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}elseif($action == 'addaccount'){ 
		define('MyConst2', TRUE); 
		include_once './contents/addaccount.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'addpayment'){ 
		define('MyConst2', TRUE); 
		include_once './contents/addpayment.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	
	elseif($action == 'invoices'){ 
		define('MyConst2', TRUE); 
		include_once './contents/invoices.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'edit_invoice'){ 
		define('MyConst2', TRUE); 
		include_once './contents/edit_invoice.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'edit_account'){ 
		define('MyConst2', TRUE); 
		include_once './contents/edit_account.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'edit_member'){ 
		define('MyConst2', TRUE); 
		include_once './contents/edit_member.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'delete_invoice'){ 
		define('MyConst2', TRUE); 
		include_once './contents/delete_invoice.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'edit_payment'){ 
		define('MyConst2', TRUE); 
		include_once './contents/edit_payment.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'delete_payment'){ 
		define('MyConst2', TRUE); 
		include_once './contents/delete_payment.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'viewreferrals'){ 
		define('MyConst2', TRUE); 
		include_once './contents/viewreferrals.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'viewearnings'){ 
		define('MyConst2', TRUE); 
		include_once './contents/viewearnings.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'inactive'){ 
		define('MyConst2', TRUE); 
		include_once './contents/inactive.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
				
?>
	
<?php endif; } 
function init_payments($command, $status, $user_id, $id){
	define('MyConst2', TRUE); 
	include_once './contents/payments.php';
	init_user_id($command, $status, $user_id, $id);
	echo'
	</section>
</body>
</html>';
}

function init_viewaccounts($command, $status, $user_id, $id){
	define('MyConst2', TRUE); 
	include_once './contents/viewaccounts.php';
	init_user_id($command, $status, $user_id, $id);
	echo'
	</section>
</body>
</html>';
}

function init_viewmembers($command, $status, $user_id, $id){
	define('MyConst2', TRUE); 
	include_once './contents/viewmembers.php';
	init_user_id($command, $status, $user_id, $id);
	echo'
	</section>
</body>
</html>';
}
?>		
	