<?php
session_start();
$result = session_destroy();
if ($result) {
  print "<script>alert('Logged Out.');  history.back();</script>";
}
?>
