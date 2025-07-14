<?php
// Cấu hình kết nối PostgreSQL (Render)
$host = 'dpg-d1qfuvbe5dus73e7gdug-a'; // Hostname từ Render
$port = '5432';
$dbname = 'toolfb';                   // Tên database
$user = 'toolfb_user';               // Tên user
$password = 'uOhJ10P9CQd2d6O3b0UqpwZyCxYZZXJg'; // Mật khẩu

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('<div style="color:red;font-weight:bold">❌ Kết nối database thất bại: ' . $e->getMessage() . '</div>');
}
