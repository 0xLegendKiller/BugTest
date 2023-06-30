


<?php

session_start();
if (!isset($_SESSION["username"])) {
	header("HTTP/1.1 499 Unauthorized");
} else {
//$p = $_SERVER['REQUEST_URI'];

echo '<div style="width:100%"><center>';
echo '<a href="index.php?page=profile&option=main"><input type="button" style="background: black;" value="Profile main page"/></a>';
echo '  <a href="index.php?page=profile&option=my"><input type="button" style="background: black;" value="My articles"/></a>';
echo '  <a href="index.php?page=profile&option=write"><input type="button" style="background: black;" value="Write an article"/></a>';
echo '  <a href="index.php?page=profile&option=contact"><input type="button" style="background: black;" value="Contact support"/></a>';
//echo '<a href="'.$p.'&option=my"><input type="button" style="background: black;" value="asd"/></a>';
echo '</center></div>';
echo '<hr /><br />';

$option = $_GET["option"];

if ($option == "contact") {
	require_once('userprofile/contact.php');
} else if ($option == "my") {
	require_once('userprofile/my.php');
} else if ($option == "write") {
	require_once('userprofile/write.php');
} else {
//	echo 'main start page';
	echo '<br /><br /><h3> Welcome to your profile! </h3> <br />';
              echo '<i> Your profile ID: ' . $u->id . $u->uid . '</i>. ';
		if ($_SESSION["username"] == "admin") {
                        if ($u->id . $u->uid != "9897") {
				echo "This profile ID is locked out. Try different one. <br />";
			}
                }
		echo 'Your role is: <b>'.$_SESSION["username"].'</b>. ';
		if ($_SESSION["username"] != "admin") {
			echo " You're not admin.";
		}
		echo '<br />';
		echo 'You can submit an article for review. In case it meets the requirements, it will be published on the main blog page.';
		echo 'In case of any doubts, feel free to contact support using <a href="index.php?page=profile&option=contact"> this page </a>';
             
}
echo '<br /><br />';
}
?>
