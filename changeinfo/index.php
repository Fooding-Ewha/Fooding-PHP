<?php session_start();
include $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$id = $_SESSION['id'];
$query = "SELECT * FROM User WHERE `user_id` = '" . $id . "' LIMIT 1";
$result = $mysqli->query($query);
$user_info = $result->fetch_array();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Information Change</title>

	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
<body>
		<section class="main-container">
		<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php'; ?>
			<header>
				<a href='/'>
					<img class="logo" src="../public/logo.png"/>
				</a>
				<form class="search-box" action="/search/search.php" method="GET">
					<input class="search-button" type="submit" value="" />
					<input class="search-input" type="text" name="query" />
				</form>
			</header>
	<section id="main">
		<form style='margin-bottom:50px;'method="POST" action="changeInfo.php">
            <div class='info'>
            id : <input class='login-input'type="text"style='margin-right:10px; margin-left: 10px;'name="user_id" placeholder="id" value=<?php echo "$user_info[id]"; ?> disabled=true></input>
            password : <input class='login-input'type="password" style='margin-right:10px; margin-left: 10px;'name="original_password" placeholder="original password"></input>
</div>
            new password: <input class='login-input'type ="password" style='margin-right:10px; margin-left: 10px; width: 340px; margin-bottom: 15px;'name = "new_password" placeholder="new password ( Type original one if there's no change )" style = 'width: 400px;'></input>
            nickname: <input class='login-input'type="text" style='margin-right:10px; margin-left: 10px;'name="user_name" placeholder="nickname" value=<?php echo "$user_info[user_name]"; ?>></input>
            <input style='margin-top:25px;'class="login-button" type="submit" name="submit" value='submit'></input>
        </form>
	</section>
    <footer>
				<button class="top-button"/>
			</footer>
            </section>
</body>
</html>