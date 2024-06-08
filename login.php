<?PHP
ob_start(); 
session_start();
header("Content-Type: text/html; charset=utf8");
if(!isset($_POST["submit"])){
exit("錯誤執行");
}//檢測是否有submit操作 
include('connect.php');//連結資料庫
$account = $_POST['account'];//post獲得使用者名稱錶單值
$password = $_POST['password'];//post獲得使用者密碼單值
$password = md5("$password.$account");
echo $password;
if ($account && $password){//如果使用者名稱和密碼都不為空
    $sql = "select * from customer where account = '$account' and password = '$password'";//檢測資料庫是否有對應的phone和password的sql
    $result = $conn->query($sql);//執行sql
    if ($result->num_rows > 0) {
        $_SESSION['account'] = $account;
        setcookie( "account", $account);
        $_SESSION["member_state"] = 4;
        header("refresh:0;url=hotel.php");
        exit;
    }else{
        $_SESSION["member_state"] = 5;
        header("refresh:0;url=login_homepage.php");
    }
}else{//如果使用者名稱或密碼有空
    $_SESSION["member_state"] = 6;
    header("refresh:0;url=login_homepage.php");
}
$conn->close();
ob_end_flush();
?>