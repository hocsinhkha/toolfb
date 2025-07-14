<?php
session_start();
require_once '../core/db.php';

$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Quản lý người dùng</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="form-container">
  <h2>👑 Quản Lý Tài Khoản</h2>
  <table border="1" width="100%" style="background: #fff8; border-radius: 10px;">
    <tr>
      <th>ID</th><th>User</th><th>VIP</th><th>Sử dụng</th><th>Thao tác</th>
    </tr>
    <?php foreach ($users as $user): ?>
    <tr>
      <td><?= $user['id'] ?></td>
      <td><?= $user['username'] ?></td>
      <td><?= $user['vip_level'] ?></td>
      <td><?= $user['remaining_uses'] ?></td>
      <td>
        <a class="btn" href="edit_user.php?id=<?= $user['id'] ?>">✏️</a>
        <a class="btn danger" href="delete_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Xoá user này?')">🗑️</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</div>
</body>
</html>
