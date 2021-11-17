<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$user_id = $_SESSION['id'];
$comment = $_GET['comment'];
$score = $_GET['score'];
$restaurant_id = $_GET['restaurant_id'];
$query =
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
$result = $mysqli->query($query);
if ($result) {
  print "<script>alert('Review Successfully Posted.');  location.href='../review?id=$restaurant_id'</script>";
} else {
  print "<script>alert('Error on posting the review.');  history.back();'</script>";
}
?>
