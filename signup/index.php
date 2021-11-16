<?php session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!-- <link rel="stylesheet" href="/css/main.css"> -->
</head>
<body>

	<section id="main">
		<form method="POST" action="addUser.php">
            <input type="text" name="user_id" placeholder="id"></input>
            <input type="password" name="user_password" placeholder="password"></input>
            <input type="text" name="user_name" placeholder="nickname"></input>
            <input type="submit" name="submit"></input>
        </form>
	</section>
</body>
</html>
