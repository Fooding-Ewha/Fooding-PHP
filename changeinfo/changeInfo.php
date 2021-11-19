<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
$id = $_SESSION['id'];
$original_password = $_POST['original_password'];
$new_password = $_POST['new_password'];
$nickname = $_POST['user_name'];

$query1 = "SELECT * FROM User WHERE `user_id` = '" . $id . "' LIMIT 1;";
$result1 = $mysqli->query($query1);
$original_info = $result1->fetch_array();
if ($original_password != $original_info['password']) {
  echo "<script>alert('Original Password is wrong!'); history.back();</script>";
  return;
} elseif (
  $original_info['password'] != $new_password ||
  $original_info['user_name'] != $nickname
) {
  $query2 =
    "UPDATE User SET `password` = '" .
    $new_password .
    "', `user_name` = '" .
    $nickname .
    "' WHERE `user_id` = '" .
    $id .
    "';";
  $result2 = $mysqli->query($query2);
} else {
  echo "<script>alert('There is no information change!'); history.back();</script>";
  return;
}

if ($result2) {
  echo "<script>alert('User Information successfully updated!'); location.href = '/';</script>";
}

?>
