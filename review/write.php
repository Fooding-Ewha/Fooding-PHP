<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$user_id = $_SESSION['id'];
$comment = $_GET['comment'];
$score = $_GET['score'];
$restaurant_id = $_SESSION['history'];

//$mysqli->query('START TRANSACTION');
$mysqli->begin_transaction();
$query1 =
  "INSERT INTO Review (`restaurant_id`, `user_id`, `score`, `comment`)
" .
  " VALUES ('" .
  $restaurant_id .
  "','" .
  $user_id .
  "','" .
  $score .
  "','" .
  $comment .
  "')";
$result1 = $mysqli->query($query1);

if ($result1) {
  $query2 = 'SELECT AVG(score) AS average FROM Review';
  $result2 = $mysqli->query($query2);

  $first_row = $result2->fetch_array();
  $average = $first_row['average'];

  $query3 =
    "UPDATE Restaurant
  SET score = '" .
    $average .
    "'
  WHERE restaurant_id = '" .
    $restaurant_id .
    "'";
  $result3 = $mysqli->query($query3);

  if ($result3) {
    $mysqli->commit();
  } else {
    $mysqli->rollback();
    print "<script>alert('Error on posting the review.');  history.back();'</script>";
  }
  print "<script>alert('Review Successfully Posted.');  location.href='../review?id=$restaurant_id'</script>";
} else {
  $mysqli->rollback;
  print "<script>alert('Error on posting the review.');  history.back();'</script>";
}
?>
