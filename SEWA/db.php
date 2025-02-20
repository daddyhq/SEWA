<?php
$servername = "localhost"; // أو يمكنك استخدام "127.0.0.1"
$username = "root"; // افتراضيًا في XAMPP
$password = ""; // كلمة المرور الافتراضية في XAMPP هي فارغة
$dbname = "SEWA"; // اسم قاعدة البيانات التي أنشأتها

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>