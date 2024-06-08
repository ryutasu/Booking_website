<!DOCTYPE html>
<?php
    session_start();
    if($_SESSION["member_state"] != 4)
    {
        header("refresh:0;url=login_homepage.php");
        exit(); 
    }
?>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Menu</title>
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
		<img class="img-width" src="https://cf.bstatic.com/xdata/images/hotel/max1024x768/56223694.jpg?k=182ac17df28ad2165df34900a4441fee9e179b3275ef25ed16ee6f876f6d6d0d&o=&hp=1" alt="">
	</div>
        <div class="colorblock4">
            <table cellpadding="1" align="center">
                <br>
                <br>
                <br>
                
                <?php
                    include('connect.php');
                    $account = $_SESSION['account'];
                    $sql100="select username from customer where account = '$account'";
                    $result100=$conn->query($sql100);
                    $attr = $result100->fetch_row();
                    echo '<div class="text1">';
                    echo '<h3>'.$attr[0].'的訂單</h3>';
                    echo '</div>';
                    $appointment_ID = $_COOKIE["appointment_ID"];
                    $sql = "SELECT * FROM `appointment_details` WHERE `appointment_ID` = '$appointment_ID'";
                    echo '<br>';
                    $results = mysqli_query( $conn, $sql);
                    if ($results->num_rows == 0){
                        echo "<h1>尚無訂單<h1>";
                        die();
                    }
                    while ($result = mysqli_fetch_array($results,MYSQLI_ASSOC)) {
                        $room_ID = $result['room_ID'];
                        $sql2="select * from room where room_ID = '$room_ID'";
                        $results2 = mysqli_query( $conn, $sql2);
                        if ($results2->num_rows == 0){
                            echo "get hotel: fail";
                            die();
                        }
                        while ($result2 = mysqli_fetch_array($results2,MYSQLI_ASSOC)) {
                            echo '<tr align="center">';
                        echo '<td>';
                            echo '<div class="menu_gallery">';
                            echo '<div class="text4">';
                                echo '<img src="'.$result2['room_picture'].'" alt="'.$result2['room_picture'].'" width="300"height="250">';
                                echo '</div>';
                                    echo '<div class="text2">';
                                        echo '<h3>'.$result2['room_name'].'</h3>';
                                        echo '<h2>入住時間:'. $result['check_in_date'] .'<br></h2>';
                                        echo '<h2>退房時間:'. $result['check_out_date'] .'</h2>';
                    echo '</div>';
                                echo '<div class="text3">';
                                    echo '<form method="post" action="check_out.php">';
                                        echo '<input type="hidden" name="appointment_details_ID" value="'.$result['appointment_details_ID'].'">';
                                        echo '<input type="hidden" name="room_price" value="'.$result['room_price'].'">';
                                        echo '<input style="color:white;border:0px none;background-color:#e4002b;font-size:30pt;text-align:center;font-family:Microsoft JhengHei;margin_top: 2px" type="submit" name="op"  value="取消訂房">';
                                        echo '</form>';
                                echo '</div>';
                            echo '</div>';
                        echo '</td>';
                        echo '</tr>';
                      }
                    }
                    echo '<div class="text1">';
                      $sql15 = "SELECT prices_sum FROM appointment WHERE appointment_ID = '$appointment_ID'";
                      $result15 = $conn->query($sql15);
                      $attr = $result15->fetch_row();
                      echo '<h3>訂單總價: '.$attr[0].'</h3>';
                    echo '</div>';
                    mysqli_close($conn);
                ?>
            </table>
        </div>		
    </body>
</html>
