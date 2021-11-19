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
<section class="main-container">
	<div class="top-bar">
		<button class="menu-button"/>
	</div>
	<header>
		<a href='/'>
			<img class="logo" src="../public/logo.png"/>
		</a>
		<form class="search-box" action="/search/search.php" method="GET">
			<input class="search-button" type="submit" value="" />
			<input class="search-input" type="text" name="query" />
		</form>
	<div style="display: flex; flex-direction: row;">
		<?php $query = 'SELECT * FROM Keyword';
// echo mysqli->error;
// $result = $mysqli->query($query);
// echo $result;

// while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
//   print "<a href='/search/search.php?keyword=$row[name]' style='font-size: 12px; color: grey; margin: 5px'>$row[name]</a>";
// }
//
?>
  	</div>
	</header>  
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
     "SELECT *, rank() OVER(order by score desc) AS ranking FROM Restaurant WHERE category_id='" .
       $category .
       "'"
   );
 }
 ?>
 <!--여기서부터 그리드 아이템-->
  <div class="container" style="display: grid; grid-template-columns: 400px 300px; padding: 10px;">
  <?php if ($restaurant_list->num_rows > 0) {
    while ($row = $restaurant_list->fetch_array(MYSQLI_ASSOC)) {
      $onclick_query = "location.href='/restaurant?name=$row[restaurant_id];";

      print "<div><h5>$row[ranking]</h5><img src='$row[image]' style='width: 70px; height: 70px; border-radius: 50%;'></img><a href='/restaurant?id=$row[restaurant_id]' style='text-decoration: none; color: inherit;'> $row[name] <br> $row[address] </a></div>"; // 아이템 담는 a 태그
    }
  } else {
    echo 'No Restaurant exists for the clicked value';
  } ?></div>
  </section>
  <footer>
		<button class="top-button"/>
	</footer>
</section>
</body>
</html>