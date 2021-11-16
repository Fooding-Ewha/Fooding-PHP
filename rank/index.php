<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!-- <link rel="stylesheet" href="/css/main.css"> -->
</head>
<body>
   
  
 <?php
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 $query_string = $_GET['value'];
 print "<h3>Ranking for $query_string</h3>";
 if (isset($_GET['region'])) {
   $region = $_GET['region'];
   $restaurant_list = $mysqli->query(
     "SELECT * FROM Restaurant WHERE region_id='" . $region . "'"
   );
 } elseif (isset($_GET['category'])) {
   $category = $_GET['category'];
   $restaurant_list = $mysqli->query(
     "SELECT * FROM Restaurant WHERE category_id='" . $category . "'"
   );
 }
 ?>
  <div class="container" style="display: grid; grid-template-columns: 300px 300px; padding: 1px;">
  <?php if ($restaurant_list->num_rows > 0) {
    while ($row = $restaurant_list->fetch_array(MYSQLI_ASSOC)) {
      print "<div class='item'>$row[name] <br> $row[address]</div>";
    }
  } else {
    echo 'No Restaurant exists for the clicked value';
  } ?></div>
</body>
</html>