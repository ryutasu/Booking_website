<!DOCTYPE html>
<?php
    session_start();
    if(isset($_COOKIE["account"]) && isset($_SESSION['account']))
    {
        $_SESSION["member_state"] = 4;
        header("refresh:0;url=hotel.php");
        exit(); 
    }
?>
<html>
    <head>
	<meta charset="UTF-8">
	<title>Login</title>
        <link rel="stylesheet" href="web_style.css">
    </head>
<body>
	<div class="colorblock1">
		<div class="text1">
			<a href="index.php" style="color:white;text-decoration:none;">首頁</a>
		</div>
	</div>
	<div class="background1">
		<img class="img-width" src="https://static.wixstatic.com/media/911f3a_8e39065dc1754b23b410253dc457bdfb.jpg/v1/fill/w_718,h_479,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/911f3a_8e39065dc1754b23b410253dc457bdfb.jpg" alt="">
	</div>
	<div class="colorblock2">
            <div class="text1">
                    <h2>會員登入</h2>
            </div>
            <?php
                if($_SESSION["member_state"] == 7){
                    echo '<p class="sub_title"">請先登入會員，才能查看訂單</p>';
                    $_SESSION["member_state"] = 0;
                }
                if($_SESSION["member_state"] == 1){
                        echo '<p class="sub_title">註冊成功，請登入或重新 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="singin.php">註冊</a></p>';
                }else if($_SESSION["member_state"] == 5){
                    echo '<p class="sub_title">錯誤的電話號碼或密碼<br>請重新填寫或 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="singin.php">註冊</a></p>';
                }else if($_SESSION["member_state"] == 6){
                    echo '<p class="sub_title">登入訊息不完整<br>請重新填寫或 <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="singin.php">註冊</a></p>';
                }else{
                    echo '<p class="sub_title">還不是會員嗎? <a style="color:#e4002b; font-weight:bold;font-size:30px;text-decoration:none" href="singin.php">註冊</a></p>';
                }
            ?>
            <form method="post" action="login.php">
                <div class="login_gallery">
                        <div class="login_text">
                                <label>帳號(Account):</label><br>
                                <input class="login_input" type="text" name="account" ><br>
                                <label>密碼(Password):</label><br>
                                <input class="login_input" type="password" name="password"><br>
                        </div>
                </div>
                <br>
                <div class="big_button" text-align:right>
                    
                    <button class="big_button" type="submit" name="submit" value="登入" >登入</button>
                </div>
            </form>
	</div>
</body>
</html>
