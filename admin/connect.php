<?php
// connect.php

// Kết nối với MySQL
$servername = "localhost";
$username = "root"; // Tên đăng nhập vào MySQL
$password = ""; // Mật khẩu đăng nhập vào MySQL
$dbname = "du_an_mau"; // Tên cơ sở dữ liệu chứa bảng 'sanpham'

// Kết nối tới MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
}
//  else {
//     echo 'Kết nối thành công!';
// }

?>
