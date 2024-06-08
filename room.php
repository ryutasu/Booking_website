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
                        <a href="hotel.php" style="color:white;text-decoration:none">訂房</a>
                        <?php
                        if(isset($_COOKIE["appointment_ID"])){
                            echo '<a href="appointment.php" style="color:white;text-decoration:none">訂單</a>';
                        }
                        ?>
                </div>
        </div>
        <div class="background1">
		<img class="img-width" src="https://t-cf.bstatic.com/xdata/images/hotel/max1024x768/71827031.jpg?k=1955438e49a87beea987775ff0059bd7e25f26eb46fe1d9c7475565d75c6fad6&o=" alt="">
	</div>
        <div class="colorblock4">
            <table cellpadding="1" align="center">
                <br>
                <br>
                <?php
                    include('connect.php');
                    session_start();
                    if(isset($_POST["hotel_ID"])){
                        $_SESSION["hotel_ID"] = $_POST["hotel_ID"];
                    }
                    $hotel_ID = $_SESSION["hotel_ID"];
                    
                    $sql100="select hotel_name from hotel where hotel_ID  = '$hotel_ID'";
                    $result100=$conn->query($sql100);
                    $attr = $result100->fetch_row();
                    
                    $sql = "SELECT * FROM `room` where hotel_ID = '$hotel_ID'";
                    $results = mysqli_query( $conn, $sql);
                    if ($results->num_rows == 0){
                        echo "get hotel: fail";
                        die();
                    }
                    $type = array("房間");
                    $type_count = 0 ;
                    $last_type = 'G';
                    $item = 6;
                    $change_type = 0;
                    while ($result = mysqli_fetch_array($results,MYSQLI_ASSOC)) {
                        if($last_type!=$result['room_ID'][0] || $item == 6){
                            $change_type = 0;
                            echo '<tr align="center">';
                                echo '<td colspan="6">';
                                    echo '<div class="text1"><h2>'.$attr[0].'<h2></div>';
                                echo '</td>';
                            echo '</tr>';
                            $last_type=$result['room_ID'][0];
                            $item = 0;
                        }
                        if($item == 0){
                            echo '<tr align="center">';
                        }
                        echo '<td>';
                            echo '<div class="menu_gallery">';
                            echo '<div class="text4">';
                                echo '<img src="'.$result['room_picture'].'" alt="'.$result['room_picture'].'" width="300"height="250">';
                                echo '</div>';
                                    echo '<div class="text12">';
                                        echo '<h3>'.$result['room_name'].'</h3>';
                                        echo '<h3>房間設備:'. $result['description'] .'</h3>';
                                        echo '<h1>價格:'. $result['price'] .'$</h1>';
                    echo '</div>';
                                echo '<div class="text3">';
                                    echo '<form method="post" action="order_process.php">';
                                        echo '<input type="hidden" name="room_ID" value="'.$result['room_ID'].'">';
                                        echo '<input style="color:white;border:0px none;background-color:#e4002b;font-size:30pt;text-align:center;font-family:Microsoft JhengHei;margin_top: 2px" type="submit" name="op"  value="前往訂房">';
                                        echo '</form>';
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
