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

	<!-- <link rel="stylesheet" href="/css/main.css"> -->
</head>
<body>
	<section id="main">
		<form method="POST" action="changeInfo.php">
            id: <input type="text" name="user_id" placeholder="id" value=<?php echo "$user_info[id]"; ?> disabled=true></input>
            password: <input type="password" name="original_password" placeholder="original password"></input>
            new password: <input type ="password" name = "new_password" placeholder="new password ( Type original one if there's no change )" style = 'width: 400px;'></input>
            nickname: <input type="text" name="user_name" placeholder="nickname" value=<?php echo "$user_info[user_name]"; ?>></input>
            <input type="submit" name="submit"></input>
        </form>
	</section>
</body>
</html>