<?php
include_once './includes/db_connect.php';
include_once './includes/functions.php'; 

if (isset($tittle) == false) {$tittle = 'VPNku.net - Jasa SSH dan VPNku murah dan berkualitas';}
if (isset($page) == false) {$page = 'home';}

if ($page != 'clientarea') : 
sec_session_start();
endif;
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
	<title><?php echo $tittle; ?></title>
	<link href="./css/style.css" rel="stylesheet" type="text/css" media="all"/>
	<link href="./css/slider.css" rel="stylesheet" type="text/css" media="all"/>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,700,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="./js/jquery.min.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>
<?php if ($page == 'home') : ?>
	<script src="./js/jquery.easydropdown.js"></script>
	<script type="text/javascript" src="./js/jquery.nivo.slider.js"></script>
 	<script src="./js/jquery.magnific-popup.js" type="text/javascript"></script>
 	<link href="./css/magnific-popup.css" rel="stylesheet" type="text/css">
 	<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>  
<?php elseif ($page == 'clientarea') : ?>
	<?php if (login_check($mysqli) == false) : ?>
    <script type="text/JavaScript" src="./js/sha512.js"></script> 
	<script type="text/JavaScript" src="./js/forms.js"></script>
	<link rel="stylesheet" href="./css/login.css" />    
	<?php endif; ?>    
<?php elseif ($page == 'register') : ?>
	<script type="text/JavaScript" src="./js/sha512.js"></script> 
	<script type="text/JavaScript" src="./js/forms.js"></script>
	<link rel="stylesheet" href="./css/login.css" />
<?php endif; ?>
	<style>
	.arrow_box { position: relative; background: #88b7d5; border: 4px solid #c2e1f5; margin-top:100px; } .arrow_box:after, .arrow_box:before { left: 100%; top: 50%; border: solid transparent; content: " "; height: 0; width: 0; position: absolute; pointer-events: none; } .arrow_box:after { border-color: rgba(136, 183, 213, 0); border-left-color: #88b7d5; border-width: 30px; margin-top: -30px; } .arrow_box:before { border-color: rgba(194, 225, 245, 0); border-left-color: #c2e1f5; border-width: 36px; margin-top: -36px; }
	</style>
    <script> 
$(document).ready(function(){
$(".flip").click(function(){
$(".panel").toggle();
});
});
	</script>
	<style type="text/css"> 
	div.panel,p.flip
	{
	width:99%;
	height:75%;
	margin-top:-50px;
	padding-top:10px;
	padding-bottom:10px;
	text-align:center;
	background:#072;
	cursor:pointer;
	font-weight:bold;
	color: #FED;
	}
	div.panel,p.flip:hover
	{
	background:#093;
	color: #FFF;
	}
	div.panel
	{
	margin-top:0px;
	padding:0;
	height:400px;
	display:none;
	}
	</style>
    </head>
    <body>
    <div class="header" id="home">
  	  	<div class="header_top">
	   		<div class="wrap">
		 		<div class="logo">
					<a href="<?php echo HOMEPAGE; ?>"><img src="./images/logo.png" alt="" /></a>
				</div>
				<div class="menu">
					<ul>
<?php if ($page == 'home') : ?>
						<li class="current"><a href="./index.php#section-1" class="scroll"> Home</a></li>
						<li><a href="./index.php#section-2" class="scroll">About</a></li>
						<li><a href="./index.php#section-3" class="scroll">How to Buy ?</a></li>
						<li><a href="./index.php#section-4" class="scroll">Contact</a></li>
						<li><a href="./tos.php">ToS</a></li>
						<li><a href="./faq.php">FAQ</a></li>
<?php else : ?>
						<li class="current"><a href="./index.php#section-1"> Home</a></li>
						<li><a href="./index.php#section-2">About</a></li>
						<li><a href="./index.php#section-3">How to Buy ?</a></li>
						<li><a href="./index.php#section-4">Contact</a></li>
						<li><a href="./tos.php">ToS</a></li>
						<li><a href="./faq.php">FAQ</a></li>
<?php endif; ?>
<?php if (login_check($mysqli) == true) : ?> 
						<li class="login-up" >
							<div id="loginContainer"><a href="#" id="loginButton"><span>Hello, <?php echo htmlentities($_SESSION['username']); ?>!</span></a>
						    	<div id="loginBox">                
						          	<form id="loginForm">
						              	<a href="./clientarea.php"><span>Client Area</span></a>
                                     	<a href="./clientarea.php?action=viewaccounts"><span>View Accounts</span></a>
                                     	<hr/>
         								<a href="./includes/logout.php"><span>Log out</span></a>
						         	</form>
						     	</div>
						 	</div>
						</li>
<?php else : ?> 
						<li class="login-up" >
							<div id="loginContainer"><a href="#" id="loginButton"><span> + Account</span></a>
						    	<div id="loginBox">                
						          	<form id="loginForm">
						              	<a href="./clientarea.php"><span>Log in</span></a>
                                     	<a href="./register.php"><span>Daftar</span></a>
                                     	<hr/>
         								<a href="./forgot.php"><span>Lupa Password?</span></a>
						         	</form>
						     	</div>
						 	</div>
						</li>
<?php endif; ?>
						<div class="clear"></div>
					</ul>                    
				</div>							
	    		<div class="clear"></div>                
			</div>
		</div>
    </div>