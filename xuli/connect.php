<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlbanhoa";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT hinhanh, tenhoa, giagiamgia, giagoc FROM sanpham";
$result = $conn->query($sql);
?>
