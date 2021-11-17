<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc'; ?>


<nav class="nav-bar" style="position: absolute; left: 10px; top: 10px;">
<div class="container" style="display: flex; flex-direction: column; ">

<?php if (isset($_SESSION['id'])) {
  print "<a href='/logout'>Logout</a>";
} else {
  print "<a href='/login'>Login</a>";
  print "<a href='/signup'>SignUp</a>";
} ?>
<h3>Region</h3>
	<?php
 $region_list = $mysqli->query('select * from Region');
 if ($region_list) {
   while ($row = $region_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?region=$row[region_id]&value=$row[name]'>$row[name]</a>";
   }
 }
 ?>
   </div>
   
   <div class="container" style="display: flex; flex-direction: column; ">
   <h3>Category</h3>
	<?php
 $category_list = $mysqli->query('select * from Category');
 if ($category_list) {
   while ($row = $category_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?category=$row[category_id]&value=$row[name]'>$row[name]</a>";
   }
 }
 ?>
   </div>
   </nav>