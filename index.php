<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!-- <link rel="stylesheet" href="/css/main.css"> -->
</head>
<body>
	<!-- <?php
		include $_SERVER["DOCUMENT_ROOT"]."/php/nav.php";
	?> -->

	<section id="main">
		<?php
			include_once $_SERVER["DOCUMENT_ROOT"]."/php/mysqli.inc";
            $restaurantList = $mysqli->query("select * from restaurant");
            if($restaurantList) {
                while($row = $restaurantList->fetch_array(MYSQLI_ASSOC)){
                    print "<p>$row[name]</p>";
                }
            }
		?>
	</section>

</body>
</html>