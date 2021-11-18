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
     // advanced sql # 2 RANK
     "SELECT *, rank() OVER(order by score desc) AS ranking FROM Restaurant WHERE region_id='" .
       $region .
       "'"
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
      // 그리드 아이템 요소들이 아래 a 태그에 다 들어가서 <br> 로만 줄을 나누어놨어 근데 css 하려면 변수 빼서 태그 나눠도 좋겠어
      print "<a href='/restaurant?id=$row[restaurant_id]' style='text-decoration: none; color: inherit;'>$row[ranking] <br> $row[name] <br> $row[address] </a>"; // 아이템 담는 a 태그
    }
  } else {
    echo 'No Restaurant exists for the clicked value';
  } ?></div>
  </section>
</body>
</html>