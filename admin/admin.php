<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login_admin.php");
    exit;
}
require_once __DIR__ . '/../core/db.php';

// Xoá user
if (isset($_GET['delete_user'])) {
    $id = intval($_GET['delete_user']);
    $db->prepare("DELETE FROM users WHERE id = ?")->execute([$id]);
}

// Cập nhật user
if (isset($_POST['update_user'])) {
    $stmt = $db->prepare("UPDATE users SET username=?, password=?, vip_level=?, remaining_uses=? WHERE id=?");
    $stmt->execute([
        $_POST['username'], $_POST['password'],
        $_POST['vip_level'], $_POST['remaining_uses'],
        $_POST['id']
    ]);
}

// Thêm user
if (isset($_POST['add_user'])) {
    $stmt = $db->prepare("INSERT INTO users (username, password, vip_level, remaining_uses) VALUES (?, ?, ?, ?)");
    $stmt->execute([
        $_POST['username'], $_POST['password'],
        $_POST['vip_level'], $_POST['remaining_uses']
    ]);
}

// Dữ liệu
$users = $db->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
$packages = $db->query("SELECT * FROM vip_packages")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Quản trị Database</title>
  <style>
    table { border-collapse: collapse; width: 100%; margin-bottom: 40px }
    th, td { border: 1px solid #aaa; padding: 6px; text-align: left }
    form { margin: 0 }
    h2 { color: #0066cc }
  </style>
</head>
<body>

<h2>👤 Danh sách Users</h2>
<table>
  <tr><th>ID</th><th>Username</th><th>Password</th><th>VIP</th><th>Uses</th><th>Thao tác</th></tr>
  <?php foreach ($users as $user): ?>
    <tr>
      <form method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        <td><?= $user['id'] ?></td>
        <td><input name="username" value="<?= htmlspecialchars($user['username']) ?>"></td>
        <td><input name="password" value="<?= htmlspecialchars($user['password']) ?>"></td>
        <td><input name="vip_level" type="number" value="<?= $user['vip_level'] ?>"></td>
        <td><input name="remaining_uses" type="number" value="<?= $user['remaining_uses'] ?>"></td>
        <td>
          <button name="update_user">💾</button>
          <a href="?delete_user=<?= $user['id'] ?>" onclick="return confirm('Xoá user?')">🗑️</a>
        </td>
      </form>
    </tr>
  <?php endforeach; ?>
</table>

<h3>➕ Thêm User mới</h3>
<form method="post">
  <input type="text" name="username" placeholder="Username" required>
  <input type="text" name="password" placeholder="Password" required>
  <input type="number" name="vip_level" placeholder="VIP level" required>
  <input type="number" name="remaining_uses" placeholder="Số lần dùng" required>
  <button name="add_user">Thêm</button>
</form>

<h2>💰 Gói VIP</h2>
<table>
  <tr><th>ID</th><th>Name</th><th>Price</th><th>Uses</th></tr>
  <?php foreach ($packages as $pkg): ?>
    <tr>
      <td><?= $pkg['id'] ?></td>
      <td><?= $pkg['name'] ?></td>
      <td><?= $pkg['price'] ?></td>
      <td><?= $pkg['uses'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<p><a href="logout.php">🔓 Thoát</a></p>

</body>
</html>
