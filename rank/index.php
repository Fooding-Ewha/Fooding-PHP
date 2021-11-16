<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
   
<section id="main" style="display: flex; flex-direction: column;">
 <?php
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 $query_string = $_GET['value'];
 print "<h3>Ranking for $query_string</h3>"; // 위에 나오는 Ranking for ~ 문구
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
 <!--여기서부터 그리드 아이템-->
  <div class="container" style="display: grid; grid-template-columns: 300px 300px; padding: 10px;">
  <?php if ($restaurant_list->num_rows > 0) {
    while ($row = $restaurant_list->fetch_array(MYSQLI_ASSOC)) {
      $onclick_query = "location.href='/restaurant?name=$row[restaurant_id];";
      print "<a href='/restaurant?id=$row[restaurant_id]' style='text-decoration: none; color: inherit;'>$row[name] <br> $row[address] </a>"; // 아이템 담는 a 태그
    }
  } else {
    echo 'No Restaurant exists for the clicked value';
  } ?></div>
  </section>
</body>
</html>