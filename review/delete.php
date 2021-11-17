<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$user_id = $_SESSION['id'];
$review_id = $_GET['review_id'];
$query =
  "DELETE FROM Review
  WHERE review_id = '" .
  $review_id .
  "';";
$result = $mysqli->query($query);
$history = $_SESSION['history'];
if ($result) {
  print "<script>alert('Review Successfully deleted.');  location.href='../review?id=$history';</script>";
} else {
  print "<script>alert('Error on deleting the review.');  history.back();'</script>";
}
?>
