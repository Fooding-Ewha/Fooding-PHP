<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$user_id = $_SESSION['id'];
$comment = $_GET['edit_comment'];
$score = $_GET['edit_score'];
$restaurant_id = $_SESSION['history'];

// transaction
$mysqli->begin_transaction();

$query1 =
  "UPDATE Review SET `score` = '" .
  $score .
  "', `comment` = '" .
  $comment .
  "' WHERE `user_id` = '" .
  $user_id .
  "';";

$result1 = $mysqli->query($query1);

if ($result1) {
  $query2 = 'SELECT AVG(score) AS average FROM Review'; // advanced sql # 1 - AVG
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
    print "<script>alert('Error on editing the review.');  history.back();</script>";
    $mysqli->rollback();
  }
  print "<script>alert('Review Successfully Editted.');  location.href='../review?id=$restaurant_id'</script>";
} else {
  print "<script>alert('Error on editing the review.');  history.back();</script>";
  $mysqli->rollback();
}
?>
