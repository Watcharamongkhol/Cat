<?php
$host = "localhost";  // เซิร์ฟเวอร์ MySQL
$dbname = "cat_db";   // ชื่อฐานข้อมูล
$username = "root";   // ชื่อผู้ใช้ MySQL (ค่าเริ่มต้นคือ root)
$password = "";       // รหัสผ่าน (ค่าเริ่มต้นของ XAMPP คือว่างเปล่า)

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
