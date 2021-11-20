<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="../css/main.css?after">
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
<section class="scroll-container" id="main">
<div style="width:100%; height: 100%; display: flex; flex-direction: column; align-items: center;">
<h4>Current Statistics</h4>
<?php
$query1 =
  'SELECT c.`category_id`, c.`name` AVG(score) AS average FROM Restaurant r JOIN Category c ON r.category_id = c.category_id GROUP BY r.category_id ORDER BY average DESC;';
$result = $mysqli->query($query1);
$first_row = $result->fetch_array();
$popular_category_id = $first_row['category_id'];
$popular_category_name = $first_row['name'];

$query2 =
  'SELECT TRUNCATE(MAX(average), 2) AS max_average FROM (SELECT AVG(score) AS average FROM Restaurant GROUP BY category_id) a;';
$result = $mysqli->query($query2);
$first_row = $result->fetch_array();
$max_category_score = $first_row['max_average'];
echo "most popular category : $popular_category_name ( score : $max_category_score ) <br>"; // most popular category

$query3 =
  'SELECT b.`restaurant_id`, b.`name`, AVG(score) AS average FROM Restaurant a JOIN Region b ON a.region_id = b.region_id GROUP BY a.region_id ORDER BY average DESC;';
$result = $mysqli->query($query3);
$first_row = $result->fetch_array();
$popular_region_id = $first_row['restaurant_id'];
$popular_region_name = $first_row['name'];

$query4 =
  'SELECT TRUNCATE(MAX(average), 2) AS max_average FROM (SELECT AVG(score) AS average FROM Restaurant GROUP BY region_id) a;';
$result = $mysqli->query($query4);
$first_row = $result->fetch_array();
$max_region_score = $first_row['max_average'];
echo "most popular region : $popular_region_name ( score : $max_region_score ) <br>"; // most popular region

$query5 =
  'SELECT NAME, MAX(score) AS SCORE FROM Restaurant GROUP BY region_id, category_id ORDER BY SCORE DESC;';
$result = $mysqli->query($query5);
$first_row = $result->fetch_array();
$popular_restaurant_id = $first_row['restaurant_id'];
$popular_restaurant_name = $first_row['name'];
$max_restaurant_score = $first_row['score'];

// most popular restaurant
echo "most popular restaurant recommended : $popular_restaurant_name ( score : $max_restaurant_score )";
?>

 <?php
 include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
 $query_string = $_GET['value'];
 print "<div style='display: flex;'><h3 style='margin:10px; margin-right: '>Ranking for</h3><h3 style='color: #efb43e; margin:10px;'>$query_string</h3></div>"; // 위에 나오는 Ranking for ~ 문구
 if (isset($_GET['region'])) {
   $region = $_GET['region'];
   $restaurant_list = $mysqli->query(
     // advanced sql # 2 RANK
     "SELECT *, dense_rank() OVER(order by score desc) AS ranking FROM Restaurant WHERE region_id='" .
       $region .
       "'"
   );
 } elseif (isset($_GET['category'])) {
   $category = $_GET['category'];
   $restaurant_list = $mysqli->query(
     "SELECT *, dense_rank() OVER(order by score desc) AS ranking FROM Restaurant WHERE category_id='" .
       $category .
       "'"
   );
 }
 ?>
 <!--여기서부터 그리드 아이템-->
  <div class="container" style="display: grid; grid-template-columns: 500px 300px; grid-template-rows: 190px; grid-template-columns: 480px 480px; place-content: center; place-items:center; padding: 10px; margin:0px;">
  <?php if ($restaurant_list->num_rows > 0) {
    while ($row = $restaurant_list->fetch_array(MYSQLI_ASSOC)) {
      $onclick_query = "location.href='/restaurant?name=$row[restaurant_id];";

      print "<div style='width: 420px; height: 140px; margin-top: 15px; margin-bottom: 15px; padding: 15px;border-radius: 20px; background-color: #fcfaf6; box-shadow: 0px 1px 30px rgba(145, 145, 145, 0.2); display: flex;'>
                <h4 style='margin: 0px;color:#efb43e;'>$row[ranking]</h4>
                <img src='$row[image]' style='width: 140px; border-radius: 50%; margin-right: 50px;'></img>
                <a href='/restaurant?id=$row[restaurant_id]' style='text-decoration: none; color: inherit; display: flex;
                 flex-direction:column;justify-content: center;'> 
                  <h3 style='margin-bottom: 10px; margin-top: 0;color: #716e65;'>$row[name]</h3><div style='color:#716e65; text-size: 20px;'>$row[address] </div>
                </a>
            </div>"; // 아이템 담는 a 태그
    }
  } else {
    echo 'No Restaurant exists for the clicked value';
  } ?></div>
  </section>
  <footer>
		<button class="top-button"/>
	</footer>
  </div>
</section>
</body>
</html>