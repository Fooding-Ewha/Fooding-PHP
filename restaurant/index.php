<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<!--<link rel="stylesheet" href="/css/main.css">-->
</head>
<body>
   
<section id="main" style="display: flex; flex-direction: column;">

 <?php
 $restaurant_id = $_GET['id'];
 if (isset($restaurant_id)) {
   print "<a href='/review?id=$restaurant_id'>Click here to see the reviews</a>"; // 리뷰 페이지로 이동하는 링크
   $result = $mysqli->query(
     "SELECT * FROM Restaurant WHERE restaurant_id='" . $restaurant_id . "'"
   );
 }

 if ($result->num_rows > 0) {
   while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
     print "<img src='$row[image]' style='width: 370px; height: 280px;'></img>"; // 이미지
     print "<h3>$row[name]</h3>"; // 식당 이름
     print "<h3>$row[address]</h3>"; // 식당 주소
   }
 } else {
   die('Error occured on loading restaurant information.');
 }
 $menu_list = $mysqli->query(
   "SELECT m.name as `name`, m.image as `image`, m.price as `price` FROM Menu m join Restaurant r on m.restaurant_id=r.restaurant_id WHERE m.restaurant_id='" .
     $restaurant_id .
     "' "
 );
 if ($menu_list->num_rows > 0) {
   while ($row = $menu_list->fetch_array(MYSQLI_ASSOC)) {
     print "<img src='$row[image]' style='width: 200px; height: 150px;'></img>"; // 메뉴 이미지
     print "<h3>$row[name]</h3>"; // 메뉴 이름
     print "<h3>$row[price]</h3>"; // 메뉴 가격
   }
 } else {
   print '<h3>Menu does not exist.</h3>';
 }
 ?>
  </section>
</body>
</html>