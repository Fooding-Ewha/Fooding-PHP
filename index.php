<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" type="text/css" href="/css/main.css?after">
	<style>
   		 @import url('https://unpkg.com/swiper/swiper-bundle.min.css?after');
	</style>	
</head>
<body>
 <?php
 include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php';
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 ?>

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
		<?php
  $query1 = 'SELECT * FROM Keyword';
  $result1 = $mysqli->query($query1);

  while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
    print "<a href='/search/search.php?keyword=$row[name]' style='font-size: 12px; color: grey; margin: 5px'>$row[name]</a>";
  }
  ?>
  	</div>
	</header>
	<div class="swiper mySwiper">
      <div class="swiper-wrapper">
	  <?php
   $query2 =
     'SELECT `image`, `restaurant_id` FROM Restaurant ORDER BY `score` DESC LIMIT 9';
   $result2 = $mysqli->query($query2);

   while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {

     $restaurant_id = $row['restaurant_id'];
     $image = $row['image'];
     ?> <img class='swiper-slide' src=<?php echo "$image"; ?> style='object-fit:cover;' onclick="location.href='/restaurant?id=<?php echo $restaurant_id; ?>'"></img>
   <?php
   }
   ?>
      </div>
      <!-- <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div> -->
      <div class="swiper-pagination"></div>
    </div>

	<footer>
		<button class="top-button"/>
	</footer>
</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="slider.js"></script>

</body>
</html>