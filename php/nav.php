<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc'; ?>
<div class="top-bar">
		<button class="menu-button" onclick="openMenu();" id='menuBtn'/>
	</div>
<link rel="stylesheet" type="text/css" href="/css/main.css?after">
<nav class="nav-bar hidden">
<div class="container" style="display: flex; flex-direction: column; padding: 15px;">

<?php if (isset($_SESSION['id'])) {
  print "<a href='/logout' style='text-decoration:none;'>Logout</a>";
  print "<a href='/withdraw'style='text-decoration:none;'>Withdraw</a>";
  print "<a href='/changeinfo' style='text-decoration:none;'>Change User Information</a>";
} else {
  print "<a href='/login'style='text-decoration:none;'>Login</a>";
} ?>
<h3>Region</h3>
	<?php
 $region_list = $mysqli->query('select * from Region');
 if ($region_list) {
   while ($row = $region_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?region=$row[region_id]&value=$row[name]'style='text-decoration:none;'>$row[name]</a>";
   }
 }
 ?>
   </div>
   
   <div class="container" style="display: flex; flex-direction: column; margin-bottom:10px;margin-left:20px;">
   <h3>Category</h3>
	<?php
 $category_list = $mysqli->query('select * from Category');
 if ($category_list) {
   while ($row = $category_list->fetch_array(MYSQLI_ASSOC)) {
     print "<a href='/rank?category=$row[category_id]&value=$row[name]' style='text-decoration:none;'>$row[name]</a>";
   }
 }
 ?>
   </div>
   </nav>
   <div class='outside hidden' onclick='closeMenu();'>
</div>
   <script defer src="../php/nav.js"></script>