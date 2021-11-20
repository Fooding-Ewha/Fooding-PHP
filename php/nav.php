<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc'; ?>
<div class="top-bar">
		<button class="menu-button" onclick="openMenu();" id='menuBtn'/>
	</div>
<link rel="stylesheet" type="text/css" href="/css/main.css?after">
<nav class="nav-bar hidden">
<div class="container" style="display: flex; flex-direction: column; padding: 15px;">

<?php if (isset($_SESSION['id'])) {
  print "<a href='/logout'>Logout</a>";
  print '<a href=/withdraw>Withdraw</a>';
  print '<a href=/changeinfo>Change User Information</a>';
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
   <div class='outside' onclick='closeMenu();'>
</div>
   <script defer src="../php/nav.js"></script>