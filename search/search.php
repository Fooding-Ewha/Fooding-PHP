<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="/css/main.css">
</head>
<body>

<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$query = $_GET['query'];
($raw_results = $mysqli->query(
  "SELECT r.name as `name`, r.address as `address` FROM Restaurant r join Category c on r.category_id=c.category_id WHERE r.name LIKE '%" .
    $query .
    "%' OR c.name LIKE '%" .
    $query .
    "%'"
)) or die($mysqli->error);
if ($raw_results->num_rows > 0) {
  while ($results = $raw_results->fetch_array(MYSQLI_ASSOC)) {
    echo '<p><h3>' . $results['name'] . '</h3>' . $results['address'] . '</p>';
  }
} else {
  echo 'No results';
}
?>
</body>
</html>
