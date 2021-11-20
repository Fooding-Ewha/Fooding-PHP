<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Search Result</title>

	<link rel="stylesheet" href="../css/main.css">
</head>
<body>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
if (isset($_GET['query'])) {
  $query = $_GET['query'];
  ($result = $mysqli->query(
    "SELECT r.name as `name`, r.address as `address`, r.image as `image` FROM Restaurant r join Category c on r.category_id=c.category_id WHERE r.name LIKE '%" .
      $query .
      "%' OR c.name LIKE '%" .
      $query .
      "%'"
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
    echo 'Search result for ' . $query;
  } else {
    echo 'Search result for ' . $keyword;
  }

  while ($row = $result->fetch_array(MYSQLI_ASSOC)) { ?>
    <img src=<?php echo "$row[image]"; ?> style='width: 140px; height: 140px; border-radius: 50%; margin-right: 50px;'></img>
    <h3><?php echo "$row[name]"; ?><br><?php echo "$row[address]"; ?></h3>;
    <?php }
} else {
  echo 'No results';
}
?>
</body>
</html>
