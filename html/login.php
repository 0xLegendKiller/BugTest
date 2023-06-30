<?php

//echo "login here <br /><br /><br />";
session_start();
require_once('/var/www/html/crypt.php');
require_once('/var/www/html/userdata.php');
if (empty($_SESSION["username"]) or !isset($_SESSION["username"])) {
	//echo "LOGIN FORM";
	if (empty($_POST["submit"]) or !isset($_POST["submit"])) {
		echo "<h2> Log In! </h2> <br />";
		echo '<form action="index.php?page=login" method=POST>';
		echo '<input type=text name=username /> Username';
		echo '<input type=password name=password /> Password';
		echo '<input type=hidden name=submit value=submit/><br /><br />';
		echo '<input type=submit value=LOGIN />';
		echo '</form>';
	} else {	
		$username = $_POST["username"];
		$password = $_POST["password"];
		//echo $username . $password;
		if ($username == "fooblog" && $password == "foo0blog1") {
		$_SESSION["username"] = "user";
		$id = rand(22,89);
		$uid = rand(18,89);
		$role = "user";
		$u = new userdata;
		$u->id = $id;
		$u->uid = $uid;
		$u->role = $role;
		$s = serialize($u);
		$e = encrypt($s);
		$b = base64_encode($e);
		setcookie("auth", $b, time()+3600);
		header("Location: index.php?page=profile");
		} else {
			echo "Incorrect password.";
		}
	}


} else {
	header("Location: index.php?page=profile");
}
?>
