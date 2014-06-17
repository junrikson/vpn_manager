<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) :
include('Net/SSH2.php');

function add_user($username, $password, $server_host, $server_username, $server_password){
	$ssh = new Net_SSH2($server_host);
	if ($ssh->login($server_username, $server_password) == false) {
    	exit('Login Failed');
	}

	$password = preg_replace('/\s/', '', $ssh->exec('openssl passwd -1 -salt $(openssl rand -base64 6) '.$password));
	$command = "useradd -e 2020-10-10 -s /sbin/nologin -m -p '".$password."' ".$username;
	echo $ssh->exec($command);
}

function delete_user($username, $server_host, $server_username, $server_password){
	$ssh = new Net_SSH2($server_host);
	if ($ssh->login($server_username, $server_password) == false) {
    	exit('Login Failed');
	}

	$command = 'userdel -r '.$username;
	echo $ssh->exec($command);
}

?>

<html>
<head>
<title>User Management</title>
</head>
<body>
<div style="width: 100%;">
<div style="width: 300px; margin: 0 auto; left: 0; top: 0; position:absolute;">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	<input type="text" name="username" placeholder="Username" />
    <input type="text" name="password" placeholder="Password" />
    <input type="Submit" value="Add" /> 
</form>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
	<input type="text" name="username" placeholder="Username" />
    <input type="Submit" value="Delete" /> 
</form>
</div>
</div>
</body>
</html>


<?php

if((array_key_exists('username', $_POST)) and (array_key_exists('password', $_POST))){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
	echo '<div style="width: 300px; margin: 0 auto; right: 0; top: 0; position:absolute;">';
	echo 'Singapore : ';
	if(add_user($username, $password.'sg1', 'sg.vpnku.net', 'root', 'simbadda7332') == "") echo 'Success';
	echo '<br/>US : ';
	if(add_user($username, $password.'us1', 'us.vpnku.net', 'root', 'simbadda7332') == "") echo 'Success';
	echo '<br/>Indonesia : ';
	if(add_user($username, $password.'id1', 'id.vpnku.net', 'root', 'simbadda7332') == "") echo 'Success';
	echo '</div>';
}
elseif(array_key_exists('username', $_POST)){
	$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	echo '<div style="width: 300px; margin: 0 auto; right: 0; top: 0; position:absolute;">';
	echo 'Singapore : ';
	if(delete_user($username, 'sg.vpnku.net', 'root', 'simbadda7332') == "") echo 'Success';
	echo '<br/>US : ';
	if(delete_user($username, 'us.vpnku.net', 'root', 'simbadda7332') == "") echo 'Success';
	echo '<br/>Indonesia : ';
	if(delete_user($username, 'id.vpnku.net', 'root', 'simbadda7332') == "") echo 'Success';
	echo '</div>';
}
endif; 
?>