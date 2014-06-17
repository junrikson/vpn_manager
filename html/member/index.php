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
	<link rel="icon" href="./images/favicon.ico" type="image/x-icon">
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" media="screen" type="text/css" href="./member/css/datepicker.css" />
	<script type="text/javascript" src="./member/js/datepicker.js"></script>
	<script type="text/javascript" src="./member/js/jquery.js"></script>
	<script type="text/javascript" src="./member/js/datepicker.js"></script>
    <script type="text/javascript" src="./member/js/eye.js"></script>
    <script type="text/javascript" src="./member/js/utils.js"></script>
    <script type="text/javascript" src="./member/js/layout.js?ver=1.0.2"></script>
	<title>VPNku.net - Client Area</title>
	
	<link rel="stylesheet" href="./member/css/layout.css" type="text/css" media="screen" />
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="./member/js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="./member/js/hideshow.js" type="text/javascript"></script>
	<script src="./member/js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./member/js/jquery.equalHeight.js"></script>
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
    $(function(){
        $('.column').equalHeight();
    });
	</script>
<style type="text/css">
.cool_button {
	-moz-box-shadow:inset 0px 1px 0px 0px #f9eca0;
	-webkit-box-shadow:inset 0px 1px 0px 0px #f9eca0;
	box-shadow:inset 0px 1px 0px 0px #f9eca0;
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f0c911), color-stop(1, #f2ab1e) );
	background:-moz-linear-gradient( center top, #f0c911 5%, #f2ab1e 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f0c911', endColorstr='#f2ab1e');
	background-color:#f0c911;
	-webkit-border-top-left-radius:37px;
	-moz-border-radius-topleft:37px;
	border-top-left-radius:37px;
	-webkit-border-top-right-radius:0px;
	-moz-border-radius-topright:0px;
	border-top-right-radius:0px;
	-webkit-border-bottom-right-radius:37px;
	-moz-border-radius-bottomright:37px;
	border-bottom-right-radius:37px;
	-webkit-border-bottom-left-radius:0px;
	-moz-border-radius-bottomleft:0px;
	border-bottom-left-radius:0px;
	text-indent:0;
	border:1px solid #e65f44;
	display:inline-block;
	color:#c92200;
	font-family:Arial;
	font-size:12px;
	font-weight:bold;
	font-style:normal;
	height:100px;
	line-height:100px;
	width:150px;
	text-decoration:none;
	text-align:center;
	text-shadow:1px 1px 0px #ded17c;
}
.cool_button:hover {
	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #f2ab1e), color-stop(1, #f0c911) );
	background:-moz-linear-gradient( center top, #f2ab1e 5%, #f0c911 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f2ab1e', endColorstr='#f0c911');
	background-color:#f2ab1e;
}.cool_button:active {
	position:relative;
	top:1px;
}
.arrow_box { position: relative; background: #88b7d5; border: 4px solid #c2e1f5; } .arrow_box:after, .arrow_box:before { left: 100%; top: 50%; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; } .arrow_box:after { border-color: rgba(136, 183, 213, 0); border-left-color: #88b7d5; border-width: 30px; margin-top: -30px; } .arrow_box:before { border-color: rgba(194, 225, 245, 0); border-left-color: #c2e1f5; border-width: 36px; margin-top: -36px; }
</style>
</head>

<body>
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="<?php echo HOMEPAGE; ?>"><img src="./images/logo.png" alt="" /></a></h1>
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
				echo '<article class="breadcrumbs"><a href="clientarea.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">Add New Account</a></article>';
			}
			elseif($action == 'viewaccounts'){ 
				echo '<article class="breadcrumbs"><a href="clientarea.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">View Accounts</a></article>';
			}
			elseif($action == 'viewreferrals'){ 
				echo '<article class="breadcrumbs"><a href="clientarea.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">View Referrals</a></article>';
			}
			elseif($action == 'viewearnings'){ 
				echo '<article class="breadcrumbs"><a href="clientarea.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">View Referrals</a></article>';
			}
			elseif(($action == 'invoices') or ($action == 'edit_invoice') or ($action == 'delete_invoice')){ 
				echo '<article class="breadcrumbs"><a href="clientarea.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">My Invoices</a></article>';
			}
			elseif($action == 'payments'){ 
				echo '<article class="breadcrumbs"><a href="clientarea.php">Overview</a><div class="breadcrumb_divider"></div><a class="current">My Payments</a></article>';
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
			<li class="icn_categories"><a href="clientarea.php">Overview</a></li>
			<li class="icn_add_user"><a href="clientarea.php?action=addaccount">Add New Account</a></li>
            <li class="icn_view_users"><a href="clientarea.php?action=viewaccounts">View Accounts</a></li> 
			<li class="icn_view_users"><a href="clientarea.php?action=invoices">Invoices</a></li>
            <li class="icn_view_users"><a href="clientarea.php?action=payments">Payments</a></li>           
		</ul>
		<h3>Refferals</h3>
		<ul class="toggle">
			<li class="icn_view_users"><a href="clientarea.php?action=viewreferrals">View Referrals</a></li>
			<li class="icn_folder"><a href="clientarea.php?action=viewearnings">View Earnings</a></li>
			<li class="icn_photo"><a href="clientarea.php?action=withdraw">Withdraw</a></li>
		</ul>
		<h3>Profile</h3>
		<ul class="toggle">
			<li class="icn_profile"><a href="clientarea.php?action=profiles">Your Profile</a></li>
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
		include_once './member/contents/home.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}elseif($action == 'addaccount'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/addaccount.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}elseif($action == 'viewaccounts'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/viewaccounts.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'viewreferrals'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/viewreferrals.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'viewearnings'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/viewearnings.php';
		init_user_id($status, $user_id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'invoices'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/invoices.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'edit_invoice'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/edit_invoice.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'delete_invoice'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/delete_invoice.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'edit_payment'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/edit_payment.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}
	elseif($action == 'withdraw'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/withdraw.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}elseif($action == 'viewearnings'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/viewearnings.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}elseif($action == 'delete_payment'){ 
		define('MyConst2', TRUE); 
		include_once './member/contents/delete_payment.php';
		init_user_id($status, $user_id, $id);
		echo'
	</section>
</body>
</html>';
	}		
?>
	
<?php endif; } 
function init_payments($status, $user_id, $id, $price_2, $reason_2, $details_2){
	define('MyConst2', TRUE); 
	include_once './member/contents/payments.php';
	init_user_id($status, $user_id, $id, $price_2, $reason_2, $details_2);
	echo'
	</section>
</body>
</html>';
}
?>		
	