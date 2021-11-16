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
<nav class="nav-bar" style="position: absolute; left: 10px; top: 10px;">
<div class="container" style="display: flex; flex-direction: column; ">
<h3>Region</h3>
	<?php
 $region_list = $mysqli->query('select * from Region');
 if ($region_list) {
   while ($row = $region_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?region=$row[region_id]&value=$row[name]' style='font-size: 1px;'>$row[name]</a>";
   }
 }
 ?>
   </div>
   
   <div class="container" style="display: flex; flex-direction: column; ">
   <h3>Category</h3>
	<?php
 $category_list = $mysqli->query('select * from Category');
 if ($category_list) {
   while ($row = $category_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?category=$row[category_id]&value=$row[name]' style='font-size: 1px;'>$row[name]</a>";
   }
 }
 ?>
   </div>
   </nav>
	</section>
</element>
<form action="/search/search.php" method="GET">
	<input type="text" name="query" />
	<input type="submit" value="Search" />
</form>
</body>
</html>