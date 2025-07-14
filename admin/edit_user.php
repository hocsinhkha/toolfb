<?php
require_once '../core/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vip = $_POST['vip_level'];
    $uses = $_POST['remaining_uses'];
    $stmt = $db->prepare("UPDATE users SET vip_level = ?, remaining_uses = ? WHERE id = ?");
    $stmt->execute([$vip, $uses, $_POST['id']]);
    header("Location: admin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Chỉnh sửa User</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="form-container">
  <h2>✏️ Sửa Tài Khoản</h2>
  <form method="POST">
    <input type="hidden" name="id" value="<?= $user['id'] ?>">
    <input type="number" name="vip_level" value="<?= $user['vip_level'] ?>" placeholder="Cấp VIP">
    <input type="number" name="remaining_uses" value="<?= $user['remaining_uses'] ?>" placeholder="Số lượt dùng còn lại">
    <button class="btn">Lưu Thay Đổi</button>
  </form>
</div>
</body>
</html>
