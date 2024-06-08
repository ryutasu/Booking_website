<?PHP
ob_start(); 
session_start();
header("Content-Type: text/html; charset=utf8");
include('connect.php');
$appointment_ID = $_COOKIE["appointment_ID"];
$room_price = $_POST['room_price'];
$appointment_details_ID = $_POST['appointment_details_ID'];
$account = $_SESSION['account'];
$sql="DELETE FROM appointment_details where appointment_details_ID = '$appointment_details_ID' and appointment_ID = '$appointment_ID'";
$result = $conn->query($sql);
if ($conn->query($sql) === TRUE){
    mysqli_query($conn, "UPDATE appointment SET prices_sum = prices_sum - '$room_price' where appointment_ID = '$appointment_ID'");
    $conn->close();
    ob_end_flush();
    echo "<script> alert('退訂成功');parent.location.href='appointment.php'; </script>";
}else{
    $conn->close();
    ob_end_flush();
    //header("refresh:0;url=order_process.php");
}
?>