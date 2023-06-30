<?php

session_start();
require_once('/var/www/html/userdata.php');
require_once('/var/www/html/crypt.php');
//var_dump($_SESSION);
//echo "profile page";

if (empty($_SESSION["username"]) or !isset($_SESSION["username"])) {
	header("Location: index.php?page=index");
} else {
	
	$ck = $_COOKIE["auth"];	//role management - will be serialized
	$db = base64_decode($ck);
	$d = decrypt($db);
	//echo $d;
	$u = unserialize($d);
	//var_dump($u);
	$_SESSION["username"] = $u->role;
	$auth = $u->role . $u->id . $u->uid;
	//echo 'qqqqqqqq';
	//echo "\n\n" . $auth . "\n\n";
	//$role = $ck;
	if ($auth == "admin9897") {	
		$_SESSION["username"] = "admin";
		echo "<h3>Administrative task: Import </h3>";
		echo '<br /><br /> <iframe src="9c717baeeca3a2c67f2c7797c96292ca/fetch.php"></iframe><br /><br />';
		echo '<hr /><br />';
		require_once('userprofile.php');
	} else {
		require_once('userprofile.php');
		}
}

?>
