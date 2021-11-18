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

<section id="main">

	</section>
</element>
<div class="mainContainer">
	<header>
		<img class="logo" src="../public/logo.png"/>
		<form class="searchBox" action="/search/search.php" method="GET">
			<input class="searchButton" type="submit" value="" />
			<input class="searchInput" type="text" name="query" />
		</form>
	</header>
</body>
</html>