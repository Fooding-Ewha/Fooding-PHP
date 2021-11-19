<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$id = $_POST['user_id'];
$password = $_POST['user_password'];
$password_check = $_POST['password_check'];
$nickname = $_POST['user_name'];
//$sql_user = "SELECT * FROM User WHERE `id`='" . $id . "'";
//$sql_nickname = "SELECT * FROM User WHERE `user_name`='" . $nickname . "'";
//$res_user = $mysqli->query($sql_user);
//$res_nickname = $mysqli->query($sql_nickname);
/*
if ($res_user->num_rows > 0) {
  echo "<script>alert('User Id Already Taken!');</script>";
  echo '<script>history.back();</script>';
} elseif ($res_nickname->num_rows > 0) {
  echo "<script>alert('Nickname Already Taken!');</script>";
  echo '<script>history.back();</script>';
} else {
  $query =
    'INSERT INTO User (`id`, `password`, `user_name`)' .
    " VALUES ('" .
    $id .
    "','" .
    $password .
    "','" .
    $nickname .
    "')";
  $mysqli->query($query);
  echo "<script>alert('Sign Up Successfully Completed!');</script>";
  echo "<script>location.href='../login';</script>";
}
*/
?>
