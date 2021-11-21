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
<section class="main-container">
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
    <section class='review-container'id="main">
        <?php
        $restaurant_id = $_GET['id'];
        $_SESSION['history'] = $restaurant_id;
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
            print "<div style=' display: flex;flex-direction: column; justify-content: center;align-content: center; margin-right: 30px;'>
            <img src='$row[image]' style='width: 370px; height: 280px; border-radius:30px;'></img>
            <h3 style='font-size: 30px;color:#707070; margin-bottom: 5px;'>$row[name]</h3>
            <h3 style='font-size: 20px;color:#707070;'>$row[address]</h3>
            </div>"; // 식당 주소
          }
        } else {
          print 'Error occured on loading restaurant information.';
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

            if (isset($_SESSION['id']) && $_SESSION['id'] == $row['user_id']) {

              $original_comment = $row['comment'];
              $original_score = $row['score'];
              ?>
              <div class='review'style='display:flex; flex-direction:column;justify-content: center;'>
              <div style='display: flex; flex-direction: row;'>
              <button id = 'open' class='modal-button' style='height: 40px;width:80px;'>Edit</button>  <!-- 자기가 달았던 코멘트에만 보이는 Edit 버튼이랑 Delete 버튼 -->
              <button class='modal-button' style='height: 40px;width:80px;'><a href='./delete.php?review_id=<?php echo "
                $row[review_id]"; ?>' style='text-decoration:none;'>Delete</a></button></div>
              
      <div class="modal hidden">  <!-- Edit 버튼 누르면 나오는 모달 -->
    			<div class="modal-overlay"></div>
    			<div class="modal-content" style='width:300px; height: 200px; display:flex; flex-direction: row; justify-content:center;'>
          <form action='./edit.php' method='GET'>
                     <input class='modal-input'type='text' name='edit_comment' placeholder='comment' value=<?php echo "$original_comment"; ?>>
                      <select class='selection'id='score' name='edit_score'> 
                        <option value='0'>0</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                      </select>
                      <input class='modal-button' style='height: 40px;width:80px;'type='submit' name='submit' value="Edit"/> 
            </form>
    			  </div>
 			  </div>
             
                
              <?php
            }
            ?>
           
            <div style='display:flex; flex-direction:column;'><div style='color:#716e65;'>reviewer: <?php echo "$nickname"; ?> score: <?php echo "$row[score]"; ?></div>
            <div style='color:#716e65; font-size: 20px;'><?php echo "$row[comment]"; ?></div></div><!-- 리뷰 하나씩 보여줌. -->
            <?php
          }
        } else {
          print "<div style='display:flex; flex-direction:column align-items:center;'><div style='display:flex; justify-content:center; align-items:center;'>No review written for this restaurant.</div>";
        }
        ?>
        
  <?php if (isset($_SESSION['id'])) { ?>
    <form class='comment-container'action="./write.php" method="GET">
	    <input class='modal-input' type="text" style='z-index:0;'name="comment" /> <!--댓글 input 박스-->
      <select class='selection'id="score" name="score"> <!--score 드롭다운-->
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
      </select>
	    <input class='modal-button' style='height: 40px;width:80px; 'type="submit" value="Post" />    <!--댓글 post 버튼-->
    </form>
  <?php } ?>
  </div>
    </section>
  </section>
    <script src="review.js"></script>
</body>
</html>