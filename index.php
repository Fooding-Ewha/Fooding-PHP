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
	<!--<link rel="stylesheet" type="text/css" href="https://unpkg.com/swiper/swiper-bundle.min.css?after"> -- >
	
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
  $query = 'SELECT * FROM Keyword';
  $result = $mysqli->query($query);

  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    print "<a href='/search/search.php?keyword=$row[name]' style='font-size: 12px; color: grey; margin: 5px'>$row[name]</a>";
  }
  ?>
  	</div>
	</header>
	<div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
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