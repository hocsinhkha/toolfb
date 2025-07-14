<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/../core/db.php';

$users = $db->query("SELECT * FROM users ORDER BY id DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<h2>Danh sách người dùng</h2>
<a href="logout.php">Đăng xuất</a>
<table border="1" cellpadding="6">
    <tr>
        <th>ID</th><th>Tên</th><th>VIP</th><th>Lượt còn</th><th>Thao tác</th>
    </tr>
    <?php foreach ($users as $u): ?>
    <tr>
        <td><?= $u['id'] ?></td>
        <td><?= htmlspecialchars($u['username']) ?></td>
        <td>VIP <?= $u['vip_level'] ?></td>
        <td><?= $u['remaining_uses'] ?></td>
        <td>
            <a href="edit_user.php?id=<?= $u['id'] ?>">✏️ Sửa</a> |
            <a href="delete_user.php?id=<?= $u['id'] ?>" onclick="return confirm('Xoá user này?')">❌ Xoá</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
