<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$id = $_SESSION['id'];
$query = "DELETE FROM User WHERE `user_id` = '" . $id . "';";
$result = $mysqli->query($query);
if ($result) {
  print "<script>alert('Withdraw succeeded. Thank you for using our service.'); location.href = '/';</script>";
}
session_destroy();
?>
