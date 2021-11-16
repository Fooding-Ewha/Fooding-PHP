<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
 <?php
 include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 ?>

<section id="main">
<div class="container" style="display: flex; flex-direction: column">
	<?php
 $region_list = $mysqli->query('select * from Region');
 if ($region_list) {
   while ($row = $region_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?q=$row[name]' style='font-size: 1px;'>$row[name]</a>";
   }
 }
 ?>
   </div>
		</section>
	</element>
<form action="/search/search.php" method="GET">
	<input type="text" name="query" />
	<input type="submit" value="Search" />
</form>
</body>
</html>