<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/../core/db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Thiếu ID user.");

$stmt = $db->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();

if (!$user) die("User không tồn tại.");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vip = (int)$_POST['vip_level'];
    $uses = (int)$_POST['remaining_uses'];
    $stmt = $db->prepare("UPDATE users SET vip_level = :vip, remaining_uses = :uses WHERE id = :id");
    $stmt->execute(['vip' => $vip, 'uses' => $uses, 'id' => $id]);
    header('Location: admin.php');
    exit;
}
?>
<h2>Sửa người dùng: <?= htmlspecialchars($user['username']) ?></h2>
<form method="POST">
    VIP cấp: <input type="number" name="vip_level" value="<?= $user['vip_level'] ?>"><br>
    Lượt còn: <input type="number" name="remaining_uses" value="<?= $user['remaining_uses'] ?>"><br>
    <button type="submit">Lưu</button>
</form>
<a href="admin.php">← Quay lại</a>
