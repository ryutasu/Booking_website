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
		</div>
	</div>
	<div class="background1">
		<img class="img-width" src="https://taiwan.taiwanstay.net.tw/twpic/49546.jpg
" alt="">
	</div>
	<div class="colorblock2">
		<div class="text1">
			<h2>加入會員</h2>
		</div>
                <?php
                    session_start();
                    if($_SESSION["member_state"] == 2){
                        echo '<p class="sub_title">電話號碼已被註冊，請重新填寫或 <a style="color:#e4002b;text-decoration:none;" href="login_homepage.php">登入</a></p>';
                    }else if($_SESSION["member_state"] == 3){
                        echo '<p class="sub_title">欄目空缺，請重新填寫或 <a style="color:#e4002b;text-decoration:none;" href="login_homepage.php">登入</a></p>';
                        
                    }
                    else if($_SESSION["member_state"] == 10){
                    echo '<p class="sub_title">密碼填寫不同，請重新填寫或 <a style="color:#e4002b;text-decoration:none;" href="login_homepage.php">登入</a></p>';}
                    else{
                        echo '<p class="sub_title">已經是會員嗎? <a style="color:#e4002b;text-decoration:none;" href="login_homepage.php">登入</a></p>';
                    }
                ?>
                <form method="post" action="signup.php">
                    <div class="login_gallery">
                            <div class="login_text">
                                    <label>姓名(Full Name):</label><br>
                                    <input class="login_input" type="text"  name="name"><br>
                                    <label>帳號(Account):</label><br>
                                    <input class="login_input" type="text" name="account" ><br>
                                    <label>電話號碼(Phone Number):</label><br>
                                    <input class="login_input" type="text"  name="phone"><br>
                                    <label>信箱(Email):</label><br>
                                    <input class="login_input" type="email" name="email"><br>
                                    <label>密碼(Password):</label><br>
                                    <input class="login_input" type="password" name="password"><br>
                                    <label>確認密碼(Confirmation Password):</label><br>
                                    <input class="login_input" type="password" name="password2"><br>
                            </div>
                    </div>
                    <br>
                    <div class="big_button" text-align:right>
                            <button class="big_button" type="submit" name="submit" value="註冊" >送出</button>
                    </div>
                </form>
	</div>
</body>
</html>
