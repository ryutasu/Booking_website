<?php
$server="localhost";
$db_username="root";
$db_password="";
$dbname = "hotel_system";
$conn = new mysqli($server, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>