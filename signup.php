<?php 
ob_start(); //打開緩沖區
header("Content-Type: text/html; charset=utf8");
session_start();
if(!isset($_POST['submit'])){
exit("錯誤執行");
}
$name=$_POST['name'];
$account=$_POST['account'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$password=$_POST['password'];
$password2=$_POST['password2'];
if ($name == null || $phone == null || $password == null) {
    $_SESSION["member_state"] = 3;
    ob_end_flush();
    header("refresh:0;url=singin.php");
    exit();
} 
if($password != $password2){
    $_SESSION["member_state"] = 10;
    ob_end_flush();
    header("refresh:0;url=singin.php");
    exit();
}
include('connect.php');//連結資料庫
$password = md5("$password.$account");
$sql="insert into customer(username,email,phone_number,account,password) values ('$name','$email','$phone','$account','$password')";
if ($conn->query($sql) === TRUE){
    $_SESSION["member_state"] = 1 ;
    $conn->close();
    ob_end_flush();
    header("refresh:0;url=login_homepage.php");
}else{
    $_SESSION["member_state"] = 2 ;
    $conn->close();
    ob_end_flush();
    header("refresh:0;url=singin.php");
}
?>