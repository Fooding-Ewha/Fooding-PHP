<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$user_id = $_POST['user_id'];
$user_password = $_POST['user_password'];
$query =
  "SELECT `id`, `password` from User WHERE `id`='" .
  $user_id .
  "' AND `password`='" .
  $user_password .
  "'";
$result = $mysqli->query($query);
$user_result = mysqli_fetch_array($result);
if (
  $user_id == $user_result['id'] &&
  $user_password == $user_result['password']
) {
  $_SESSION['id'] = $user_result['id'];
  echo "<script>alert('환영합니다.');</script>";
  echo "<script>location.href='./';</script>";
} else {
  echo "<script>alert('invalid username or password');</script>";
  echo '<script>history.back();</script>';
}
?>
