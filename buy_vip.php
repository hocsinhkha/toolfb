<?php
require_once 'db.php';
session_start();

if (!isset($_POST['vip_id'])) {
    die("Thiếu dữ liệu.");
}

$vip_id = (int)$_POST['vip_id'];

// Lấy gói VIP
$stmt = $db->prepare("SELECT * FROM vip_packages WHERE id = ?");
$stmt->execute([$vip_id]);
$vip = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$vip) die("Gói không tồn tại.");

// Cộng lượt
$stmt = $db->prepare("UPDATE users SET vip_level = ?, remaining_uses = ? WHERE id = ?");
$stmt->execute([$vip['id'], $vip['uses'], $_SESSION['user_id']]);

echo "Đã mua VIP thành công!";
