<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="/css/main.css?after">
</head>
<body>
 <?php
 include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 ?>

<section class="main-container">
	<div class="top-bar">
		<button class="menu-button"/>
	</div>
	<header>
		<a href='/'>
			<img class="logo" src="../public/logo.png"/>
		</a>
		<form class="search-box" action="/search/search.php" method="GET">
			<input class="search-button" type="submit" value="" />
			<input class="search-input" type="text" name="query" />
		</form>
	</header>
	<footer>
		<button class="top-button"/>
	</footer>
</section>
</body>
</html>