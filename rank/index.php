<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!-- <link rel="stylesheet" href="/css/main.css"> -->
</head>
<body>
    <div class="container" style="display: grid; grid-template-columns: auto auto;
  padding: 1px;">
 <?php
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 $restaurant_list = $mysqli->query('select * from Restaurant');
 if ($restaurant_list) {
   while ($row = $restaurant_list->fetch_array(MYSQLI_ASSOC)) {
     print "<div class='item'>$row[name]</div>";
   }
 }
 ?></div>
</body>
</html>