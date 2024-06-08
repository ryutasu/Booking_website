<!DOCTYPE html>
<?php
    session_start();
    $member_state = 0;
    $_SESSION["member_state"]=$member_state;
?>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Homepage</title>
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
		<img class="img-width" src="https://taiwan.taiwanstay.net.tw/twpic/92202.jpg"alt="">
	</div>
        <div class="homepage_title2">
            <a  style="color:white; font-size: 170px;margin-top: 20px;" text-align:justify>訂房網站</a>
	</div>
	<div class="homepage_title">
            <a href="hotel.php" style="color:white; font-size: 70px;margin-top: 20px;" text-align:justify>前往訂房→</a>
	</div>
</body>
</html>