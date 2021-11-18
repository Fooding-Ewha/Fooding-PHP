<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="../css/main.css?after">
</head>
<body>
		<section class="main-container">
			<div class="top-bar">
				<button class="menu-button"/>
			</div>
			<header>
				<img class="logo" src="../public/logo.png"/>
				<form class="search-box" action="/search/search.php" method="GET">
					<input class="search-button" type="submit" value="" />
					<input class="search-input" type="text" name="query" />
				</form>
			</header>
			<form method="POST" action="login.php">
				<section class="login-box">
					<div class="login-input-wrapper">
						<div>ID</div>
            			<input class="login-input" type="text" name="user_id"/>
					</div>
					<div class="login-input-wrapper">
						<div>PW</div>
            			<input class="login-input" type="password" name="user_password"/>
					</div>
				</section>
				<input class="login-button" type="submit" name="submit" value="login"/>
        	</form>
			<div>Don't have an account? Click <a href='/signup'>here</a> to sign in </div>
			<footer>
				<button class="top-button"/>
			</footer>
	</section>

</body>
</html>