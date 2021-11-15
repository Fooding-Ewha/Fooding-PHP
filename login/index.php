<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!-- <link rel="stylesheet" href="/css/main.css">
	<script type="text/javascript" src="register.js"></script> -->
</head>
<body>
	<!-- <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php'; ?> -->
	<!-- <script> $("#menu li:nth-child(3)").addClass("active"); </script> -->
	


	<section id="main">
			<div id="identiier">
				<label>ID</label>
				<input type="text" class="form-control" name="id">
			</div>
			<br>
			<div id="password">
				<label>PW</label>
				<input type="text" class="form-control" name="pw">
			</div>
			<br>
			<input type="submit" class="form-control">
		<div>Don't have an account? Click <button id="open">here</button> to sign in </div>
        <div class="modal hidden">
            <div class="modal__overlay" />
                <div class="modal__content">
                    <h1>I'm a modal</h1>
                    <button id="close">❎</button>
                </div>
            </div>
        </div>
	</section>
</body>
</html>