<!DOCTYPE html>

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
                        <?php
                        if(isset($_COOKIE["appointment_ID"])){
                            echo '<a href="appointment.php" style="color:white;text-decoration:none">訂單</a>';
                        }
                        ?>
                </div>
        </div>
        <div class="background1">
		<img class="img-width" src="https://taiwan.taiwanstay.net.tw/twpic/92202.jpg" alt="">
	</div>
        <div class="colorblock4">
            <table cellpadding="1" align="center">
                <br>
                <br>
                <br>
                <?php
                    session_start();
                    include('connect.php');
                    $sql = "SELECT * FROM `hotel` ";
                    $results = mysqli_query( $conn, $sql);
                    if ($results->num_rows == 0){
                        echo "get hotel: fail";
                        die();
                    }
                    $type = array("高雄","南投","屏東","澎湖","臺東","臺北","宜蘭");
                    $type_count = 0 ;
                    $last_type = 'G';
                    $item = 6;
                    $change_type = 0;
                    while ($result = mysqli_fetch_array($results,MYSQLI_ASSOC)) {
                        if($last_type!=$result['hotel_ID'][0] || $item == 6){
                            switch ($result['hotel_ID'][0]) {
                                case 'A':
                                    $change_type = 0;
                                    break;
                                case 'B':
                                    $change_type = 1;
                                    break;
                                case 'C':
                                    $change_type = 2;
                                    break;
                                case 'D':
                                    $change_type = 3;
                                    break;
                                case 'E':
                                    $change_type = 4;
                                    break;
                                case 'F':
                                    $change_type = 5;
                                    break;
                                case 'G':
                                    $change_type = 6;
                                    break;
                            }
                            echo '<tr align="center">';
                                echo '<td colspan="6">';
                                    echo '<div class="text1"><h2>'.$type[$change_type].'<h2></div>';
                                echo '</td>';
                            echo '</tr>';
                            $last_type=$result['hotel_ID'][0];
                            $item = 0;
                        }
                        echo '<tr align="center">';
                        echo '<td>';
                            echo '<div class="menu_gallery">';
                                echo '<div class="text2">';
                                    echo '<div class="text4">';
                                        echo '<img src="'.$result['hotel_picture'].'" alt="'.$result['hotel_picture'].'" width="300"height="250">';
                                    echo '</div>';
                                    echo '<h3>'.$result['hotel_name'].'</h3>';
                                    echo ''. $result['hotel_address'] .'';
                                    echo'<br>';
                                    echo 'phone:'. $result['phonenum'] ."";
                                echo '</div>';echo '<div class="text5">';
                                echo '<h4>'.$result['description'].'</h4>';
                                echo '</div>';
                                echo '<div class="text3">';
                               if($_SESSION["member_state"] != 4){
                                    echo '<form method="post" action="login_homepage.php">';
                                        echo '<input type="hidden" name="hotel_ID" value="'.$result['hotel_ID'].'">';
                                        echo '<input style="color:white;border:0px none;background-color:#e4002b;font-size:30pt;text-align:center;font-family:Microsoft JhengHei;margin_top: 2px" type="submit" name="op"  value="前往訂房">';
                                    echo '</form>';
                               }
                               else{
                                    echo '<form method="post" action="room.php">';
                                        echo '<input type="hidden" name="hotel_ID" value="'.$result['hotel_ID'].'">';
                                        echo '<input style="color:white;border:0px none;background-color:#e4002b;font-size:30pt;text-align:center;font-family:Microsoft JhengHei;margin_top: 2px" type="submit" name="op"  value="前往訂房">';
                                    echo '</form>';
                               }
                                echo '</div>';
                            echo '</div>';
                        echo '</td>';
                        $item++;
                        if($item == 6){
                            echo '</tr>';
                        }
                    }
                    mysqli_close($conn);
                ?>
            </table>
        </div>		
    </body>
</html>
