<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Result</title>

	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
<section class="main-container">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php'; ?>
	<header>
		<a href='/'>
			<img class="logo" src="../public/logo.png"/>
		</a>
		<form class="search-box" action="/search/search.php" method="GET">
			<input class="search-button" type="submit" value="" />
			<input class="search-input" type="text" name="query" />
		</form>
	<div style="display: flex; flex-direction: column; width: 100%; height: 440px;align-items: center;">
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  ($result = $mysqli->query(
    "SELECT r.name as `name`, r.address as `address`, r.image as `image`, c.name AS `category` FROM Restaurant r join Category c on r.category_id=c.category_id join Region g ON r.region_id = g.region_id WHERE r.name LIKE '%" .
      $query .
      "%' OR c.name LIKE '%" .
      $query .
      "%' OR g.name LIKE '%" .
      $query .
      "%';"
  )) or die($mysqli->error);
} elseif (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  ($result = $mysqli->query(
    "SELECT r.name as `name`, r.address as `address`, r.image as `image` FROM Restaurant r join Keyword k on r.keyword_id=k.keyword_id WHERE k.name LIKE '%" .
      $keyword .
      "%'"
  )) or die($mysqli->error);
}
if ($result->num_rows > 0) {
  if (isset($query)) {
    echo "<div style='display: flex; '><h3 style='margin:5px; margin-top: 15px;'>Search result for </h3><h3 style='color: #efb43e; margin-top: 15px;margin-left:0;'> $query</h3></div>";
  } else {
    echo "<div style='display: flex;'><h3 style='margin:5px; margin-top: 15px;'>Search result for </h3><h3 style='color: #efb43e; margin-top: 15px;margin-left:0;'> $keyword</h3></div>";
  }
}
?>
<div class="search-result-container" >
<?php
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  ($result = $mysqli->query(
    "SELECT r.name as `name`, r.address as `address`, r.image as `image`, c.name AS `category` FROM Restaurant r join Category c on r.category_id=c.category_id join Region g ON r.region_id = g.region_id WHERE r.name LIKE '%" .
      $query .
      "%' OR c.name LIKE '%" .
      $query .
      "%' OR g.name LIKE '%" .
      $query .
      "%';"
  )) or die($mysqli->error);
} elseif (isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
  ($result = $mysqli->query(
    "SELECT r.name as `name`, r.address as `address`, r.image as `image` FROM Restaurant r join Keyword k on r.keyword_id=k.keyword_id WHERE k.name LIKE '%" .
      $keyword .
      "%'"
  )) or die($mysqli->error);
}
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
  <div style='width: 35%;
  box-sizing: border-box; height: 160px; margin-top: 15px;margin-bottom: 15px; padding: 15px;border-radius: 20px; margin-left: 20px; margin-right: 20px;background-color: #fcfaf6; box-shadow: 0px 1px 30px rgba(145, 145, 145, 0.2); display: flex;'>
    <img src=<?php echo "$row[image]"; ?> style='width: 140px; height: 140px; border-radius: 50%; margin-right: 50px; margin-left: 10px;'></img> <!--레스토랑 이미지랑 텍스트 하나씩 보여줌-->
    <a href='/restaurant?id=$row[restaurant_id];' style='text-decoration: none; color: inherit; display: flex;flex-direction:column;justify-content: center;'>
      <h3 style='margin-bottom: 10px; margin-top: 0;color: #716e65;'><?php echo "$row[name]"; ?></h3>
      <div style='color:#716e65; text-size: 20px;'><?php echo "$row[address]"; ?></div>
  </a>
  </div>

    <?php }
} else {
  echo 'No results';
}
?></div>
</div>
</div>
 <footer>
		<button class="top-button"/>
	</footer>
  </div>
</section>
</body>
</html>
