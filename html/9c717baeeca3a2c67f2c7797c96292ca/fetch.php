<?php
session_start();
if ($_SESSION['username'] == "admin") {

if (!isset($_GET['action'])) {

		echo  '<p><b>Import an article</b></p>';
		echo  '<form action=fetch.php method=get>';
		echo  '<input type=text name=url /><br />';
		echo  '<input type=hidden name=action value=import />';
		echo  '<input type=submit value=Try name=import />';
		echo  '</form>';

	} else {
		$prefix = "http://";
		@$url = $_GET['url'];
		@$req = $prefix . $url;
		@$c = file_get_contents($req);
		echo $c;
	}
} else {
header("HTTP/1.1 401 Unauthorized");
}

?>
