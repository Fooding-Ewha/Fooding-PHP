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
        <!-- <div id="namediv">
				<label>이름</label>
				<input type="text" class="form-control" name="name">
				<span id="nameHelp" class="help-block"></span>
			</div>
			<br>
			<div id="nickdiv">
				<label>닉네임</label>
				<input type="text" class="form-control" name="nickname">
				<span id="nickHelp" class="help-block"></span>
			</div>
			<br>
			<input type="submit" class="form-control"> -->
		<div>Don't have an account? Click <a href='/signup'>here</a> to sign in </div>
	</section>

</body>
</html>