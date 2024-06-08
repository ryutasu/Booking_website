<!DOCTYPE html>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Singin</title>
        <link rel="stylesheet" href="web_style.css">
    </head>
<body>
	<div class="colorblock1">
		<div class="text1">
			<a href="index.php" style="color:white;text-decoration:none;">首頁</a>
                        <a href="hotel.php" style="color:white;text-decoration:none">訂房</a>
                        <a href="appointment.php" style="color:white;text-decoration:none">訂單</a>
		</div>
	</div>
	<div class="background1">
		<img class="img-width" src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/87428762.jpg?k=3f7ea7636b2689409ba55ce84f1b3c8921054cbeaebc747a517f1b2caead7a31&o=&hp=1" alt="">
	</div>
	<div class="colorblock2">
            <div class="text1">
			<h2>建立訂單</h2>
		</div>
                <?php
                    session_start();
                    if($_SESSION["member_state"] == 13){
                        echo '<p class="sub_title">填寫資料不完整<br>或重新 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="room.php">選購房間</a></p>';
                        $_SESSION["member_state"] = 16;
                    }else if($_SESSION["member_state"] == 14){
                        echo '<p class="sub_title">入住與退房時間填寫有誤<br>請重新填寫<br>或重新 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="room.php">選購房間</a></p>';
                        $_SESSION["member_state"] = 16;
                    }else if($_SESSION["member_state"] == 15){
                        echo '<p class="sub_title">此時間段已有人預約了<br>請重新填寫<br>或重新 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="room.php">選購房間</a></p>';
                        $_SESSION["member_state"] = 16;
                    }
                    include('connect.php');
                            if(isset($_POST['room_ID'])){
                                $_SESSION["room_ID"] = $_POST['room_ID'];
                            }
                            $room_ID = $_SESSION["room_ID"];
                            $sql2 = "SELECT price FROM room where room_ID = '$room_ID'";
                            $result2 = $conn->query($sql2);
                            $price = $result2->fetch_row();
                            $_SESSION["price"] = $price[0];
                            echo'<form method="post" action="book.php">';
                    echo'<div class="login_gallery">';
                            echo'<div class="login_text">';
                                    echo'<label>訂房人(Full Name):</label><br>';
                                    echo'<input class="login_input" type="text"  name="name"><br>';
                                    echo'<label>電話號碼(Phone Number):</label><br>';
                                    echo'<input class="login_input" type="text"  name="phone"><br>';
                                    echo'<label>入住人數:</label><br>';
                                    echo'<input class="login_input" type="number"  name="number_of_people"><br>';
                                    echo'<label>入住日期:</label><br>';
                                    echo'<input class="login_input" type="date"  name="check_in_date"><br>';
                                    echo'<label>退房日期:</label><br>';
                                    echo'<input class="login_input" type="date"  name="chack_out_date"><br>';
                            echo'</div>';
                    echo'</div>';
                    echo'<br>';
                    echo'<div class="big_button" text-align:right>';
                       echo '<button class="big_button" type="submit" name="submit" value="註冊" >送出</button>';
                    echo'</div>';
                echo'</form>';
                ?>
            </table>
        </div>		
    </body>
</html>
