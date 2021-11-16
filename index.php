<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
 <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php'; ?>

		<section id="main">
			<?php
   include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
   $keyword_list = $mysqli->query('select * from Keyword');
   if ($keyword_list) {
     // while ($row = $keyword_list->fetch_array(MYSQLI_ASSOC)) {
     //  print "<p>$row[name]</p>";
     // }
   }
   ?>
		</section>
	</element>
<form action="/search/search.php" method="GET">
	<input type="text" name="query" />
	<input type="submit" value="Search" />
</form>
</body>
</html>