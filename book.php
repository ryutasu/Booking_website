<?php 
ob_start(); //打開緩沖區
header("Content-Type: text/html; charset=utf8");
session_start();

if(!isset($_POST['submit'])){
exit("錯誤執行");
}//判斷是否有submit操作
include('connect.php');
$name=$_POST['name'];//post獲取表單裡的name
$account=$_COOKIE["account"];
$phone=$_POST['phone'];
$number_of_people=$_POST['number_of_people'];//post獲取表單裡的name
$check_in_date=$_POST['check_in_date'];
$chack_out_date=$_POST['chack_out_date'];
$price=$_SESSION['price'];
$room_ID=$_SESSION["room_ID"];
$hotel_ID=$_SESSION["hotel_ID"];
$today = date("F j, Y, g:i A");
$today2 = date("Y/n/j"); 
$y = 0;
if(!isset($_COOKIE["appointment_num"])){
    setcookie("appointment_num", $y);
    $appointment_num = $y;
    }
    else{
    $appointment_num = $_COOKIE["appointment_num"];
    }
if(!isset($_COOKIE["prices_sum"])){
    setcookie( "prices_sum", 0);
    }
if(!isset($_COOKIE["appointment_ID"])){
    $appointment_ID = $account.$today;
    setcookie( "appointment_ID", $appointment_ID);
    $sql5="insert into appointment(cus_acc,appointment_ID ,appointment_date) values ('$account','$appointment_ID','$today2')";
    echo $sql5;
    if ($conn->query($sql5) === TRUE){
        
    }else{
        $conn->close();
        ob_end_flush();
    }
}
else{
    $appointment_ID = $_COOKIE["appointment_ID"];
}
$appointment_details_ID = $appointment_ID.$appointment_num;

echo"'$hotel_ID','$room_ID','$account','$check_in_date','$chack_out_date','$number_of_people','$price'";
if ($name == null || $phone == null || $number_of_people == null || $check_in_date == null || $chack_out_date == null) {
    $_SESSION["member_state"] = 13;
    ob_end_flush();
    header("refresh:0;url=order_process.php");
    exit();
}
if(strtotime($check_in_date) == strtotime($chack_out_date) || strtotime($check_in_date) > strtotime($chack_out_date)){
    $_SESSION["member_state"] = 14;
    ob_end_flush();
    header("refresh:0;url=order_process.php");
    exit();
}
$sql = "SELECT * FROM `appointment_details` ";
    $results = mysqli_query($conn, $sql);
    if ($results->num_rows < 0){
        echo "get appointment: fail";
        die();
    }
$x = 0;
while ($result = mysqli_fetch_array($results,MYSQLI_ASSOC)) {
    while(strtotime($result['check_in_date']."+$x day") != strtotime($result['check_out_date']))
    {
        echo 1;
        if(strtotime($check_in_date) == strtotime($result['check_in_date']."+$x day") || strtotime($chack_out_date) == strtotime($result['check_in_date']."+$x day"))
        {
            $_SESSION["member_state"] = 15 ;
            $conn->close();
            ob_end_flush();
            header("refresh:0;url=order_process.php");
            exit();
        }
        $x++;
    }
    $x = 0;
}
$sql3="insert into appointment_details(appointment_details_ID ,appointment_ID,hotal_ID,room_ID,check_in_date,check_out_date,room_price) values ('$appointment_details_ID','$appointment_ID','$hotel_ID','$room_ID','$check_in_date','$chack_out_date','$price')";
echo $sql3;
if ($conn->query($sql3) === TRUE){
    mysqli_query($conn, "UPDATE appointment SET prices_sum = prices_sum + '$price' where appointment_ID = '$appointment_ID'");
    $_SESSION["member_state"] = 4 ;
    $conn->close();
    ob_end_flush();
    if(!isset($_COOKIE["appointment_num"])){
    setcookie("appointment_num", 1);
    }
    else{
    $appointment_num = $_COOKIE['appointment_num'];
    $appointment_num++;  // 將 $appointment_num 的值加 1
    setcookie('appointment_num', $appointment_num);
    }
    echo "<script> alert('訂房成功');parent.location.href='appointment.php'; </script>";
    header("refresh:0;url=order_process.php");
}else{
    $_SESSION["member_state"] = 2 ;
    $conn->close();
    ob_end_flush();
    header("refresh:0;url=order_process.php");
}
?>