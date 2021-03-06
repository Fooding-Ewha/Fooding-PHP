<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>

	<link rel="stylesheet" href="../css/main.css">
</head>
<body>
<section class="main-container" style="justify-content:flex-start;">
<?php include $_SERVER['DOCUMENT_ROOT'] . '/php/nav.php'; ?>
<section class="res-detail-page">
  <div class="side-bar">
    <a href='/'>
      <button class="side-bar-button">
        <img src='../public/logo.png'/>
      </button>
  </a>
  <a href='javascript:history.back()'>
    <button class="side-bar-button">
      <img src='../public/backButton.png'/>
    </button>
  </a>
  </div>
<section class='res-detail-container'id="main">
  <div class='res-inside' style='width:100%; height: 100%;display: flex;
  flex-direction: column;
  justify-content: center;overflow-y: auto; align-items:center;'>
  <h1></h1>
  <h1></h1>
  <h1></h1>
  <h1></h1>  <h1></h1>
  <h1></h1><h1></h1>

  <?php
  $restaurant_id = $_GET['id'];
  if (isset($restaurant_id)) {
    print "<a href='/review?id=$restaurant_id' style='text-decoration : none;'>
   <div style='font-size: 15px;color:#707070; font-weight: bold; margin: 20px;'>π Click here to see the reviews π</div>
   </a>";
    $result = $mysqli->query(
      "SELECT * FROM Restaurant WHERE restaurant_id='" . $restaurant_id . "'"
    );
  }
  ?>
<section class='res-image-container'>
<?php
if ($result->num_rows > 0) {
  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    print "<img src='$row[image]' style='width: 350px; border-radius: 40px;'></img>"; // μ΄λ―Έμ§
    print "<div style='display:flex; flex-direction: column; justify-content: center; margin-left: 150px;'>
              <h3 style='font-size: 20px;color:#707070; margin:0; margin-bottom:8px'>π£ππππ°</h3>
              <h3 style='font-size: 30px;color:#707070; margin-bottom:10px; margin-top: 0px;'>$row[name]</h3> 
              <div style='font-size: 20px;color:#707070;'>$row[address]</div>
          </div>";
  }
} else {
  die('Error occured on loading restaurant information.');
}
$menu_list = $mysqli->query(
  "SELECT m.name as `name`, m.image as `image`, m.price as `price` FROM Menu m join Restaurant r on m.restaurant_id=r.restaurant_id WHERE m.restaurant_id='" .
    $restaurant_id .
    "' "
);
?>

 </section>
 <?php if ($menu_list->num_rows > 0) {
   while ($row = $menu_list->fetch_array(MYSQLI_ASSOC)) {
     print "<div style='display: flex; margin: 20px; padding: 30px; border-radius: 30px; width: 550px; height: 150px; box-shadow:0px 1px 30px rgba(145, 145, 145, 0.2)'>
              <img src='$row[image]' style='width: 200px; border-radius: 50%; margin-right: 80px;'></img>
                <div style='display: flex; flex-direction: column;'>
                  <h3>$row[name]</h3> 
                  <h3>$row[price]</h3>
                </div>
            </div>"; // λ©λ΄ κ°κ²©
   }
 } else {
   print '<h3>Menu does not exist.</h3>';
 } ?>
</div>
 </section>
  </section>
</section>
</body>
</html>