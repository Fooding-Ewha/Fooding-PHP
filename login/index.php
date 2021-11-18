<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="../css/main.css?after">
</head>
<body>
	<section id="main">
		<div class="mainContainer">
			<form method="POST" action="login.php">
            	<input type="text" name="user_id"></input>
            	<input type="password" name="user_password"></input>
            	<input type="submit" name="submit"></input>
        	</form>
			<div>Don't have an account? Click <a href='/signup'>here</a> to sign in </div>
		</div>
	</section>

</body>
</html>