<?php session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/php/mysqli.inc';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Fooding</title>
	<link rel="stylesheet" href="/css/main.css">
</head>
<body>
    <section id="main" style="display: flex; flex-direction: column;">
        <?php
        $restaurant_id = $_GET['id'];
        $result1 = $mysqli->query(
          "SELECT * FROM Restaurant WHERE restaurant_id='" .
            $restaurant_id .
            "'"
        );
        if (isset($restaurant_id)) {
          $result2 = $mysqli->query(
            "SELECT * FROM Review WHERE restaurant_id='" . $restaurant_id . "'"
          );
        }
        if ($result1->num_rows > 0) {
          while ($row = $result1->fetch_array(MYSQLI_ASSOC)) {
            print "<img src='$row[image]' style='width: 370px; height: 280px;'></img>"; // 이미지
            print "<h3>$row[name]</h3>"; // 식당 이름
            print "<h3>$row[address]</h3>"; // 식당 주소
          }
        } else {
          die('Error occured on loading restaurant information.');
        }
        if ($result2->num_rows > 0) {
          while ($row = $result2->fetch_array(MYSQLI_ASSOC)) {
            $user_info = $mysqli->query(
              "SELECT `user_name` FROM User WHERE `user_id`='" .
                $row['user_id'] .
                "' LIMIT 1"
            );
            $first_row = $user_info->fetch_array();
            $nickname = $first_row['user_name'];
            print "<div>reviewer: $nickname score: $row[score] <br> $row[comment]</div>"; // 리뷰 하나씩 보여줌.
          }
        } else {
          die('No review written for this restaurant.');
        }
        ?>
    <form action="./write.php" method="GET">
      <input type='hidden' name='restaurant_id' value='<?php echo "$restaurant_id"; ?>'/> <!-- 숨어있는 아이-->
	    <input type="text" name="comment" /> <!--댓글 input 박스-->
      <select id="score" name="score"> <!--score 드롭다운-->
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
      </select>
	    <input type="submit" value="Post" />    <!--댓글 post 버튼-->
    </form>
    </section>
</body>
</html>