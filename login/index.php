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
				<a href='/'>
					<img class="logo" src="../public/logo.png"/>
				</a>
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
			<div>Don't have an account? Click <button id="open">here</button> to sign in </div>
			<footer>
				<button class="top-button"/>
			</footer>
			<section class="modal hidden">
    			<div class="modal-overlay"></div>
    			<div class="modal-content">
					<form class="signUp" method="POST" action="../signup/addUser.php">
						<img class="logo-in-modal" src="../public/logo.png"/>
						<h4>fooding</h4>
						<h5>CREATE A NEW ACCOUNT</h5>
            			<input class="modal-input" type="text" name="user_id" placeholder="id">
							<!-- <img class="modal-input-icon" src="../public/lock.png"/> -->
						</input>
            			<input class="modal-input" type="password" name="user_password" placeholder="password"/>
            			<input class="modal-input" type="text" name="user_name" placeholder="nickname"/>
           	 			<input class="modal-button" type="submit" name="submit" value="Sign up"/>
					</form>
    			</div>
			</section>
	</section>
	<script src="login.js"></script>
</body>
</html>