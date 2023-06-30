<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>FooCorp</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="?page=index">FooCorp BLOG</a>
				<nav>
					<a href="#menu">Menu</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="?page=index">Home</a></li>
					<li><a href="?page=articles">Articles</a></li>
					<!--<li><a href="?page=login">Log In</a></li>-->
				</ul>
			</nav>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h1>FOOCorp BLOG</h1>
					<p>Business & more... </p>
				</div>
				<video autoplay loop muted playsinline src="images/banner.mp4"></video>
			</section>


		<?php //echo "INCLUDES HERE";
		session_start();
		@$page = $_GET["page"];
		//var_dump($page);
		if (!empty($_SESSION["username"]) or isset($_SESSION["username"])) {
		echo '<a href="index.php?page=logout">LOG OUT</a><br />';
		}

		if ($page == "index") {
			require_once("main.html");
		} else if ($page == "articles") {
			require_once("articles.html");
		} 
		else if ($page == "login") {
			require_once("login.php");
		} else if ($page == "profile") {
			require_once("profile.php");
		} else if ($page == "logout") {
			require_once("logout.php");
		} else {
		echo "<!-- Page " . $page . " does not exist!-->";
			require_once("main.html");
		} 
 ?>
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<div class="content">
						
					</div>
					<div class="copyright">
						&copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
					</div>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
