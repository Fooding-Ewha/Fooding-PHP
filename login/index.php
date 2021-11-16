<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!-- <link rel="stylesheet" href="/css/main.css"> -->
</head>
<body>
 <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php'; ?>

	<section id="main">
		<form method="POST" action="login.php">
            <input type="text" name="user_id"></input>
            <input type="password" name="user_password"></input>
            <input type="submit" name="submit"></input>
        </form>
	</section>

</body>
</html>