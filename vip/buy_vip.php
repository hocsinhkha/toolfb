<?php
session_start();
require_once '../core/db.php';

if (!isset($_SESSION['user'])) {
  header("Location: /auth/login.php");
  exit;
}

$username = $_SESSION['user'];
$stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Các gói VIP
$vip_packages = [
  1 => ["VIP 1", 5000, 3],
  2 => ["VIP 2", 20000, 20],
  3 => ["VIP 3", 50000, 70],
  4 => ["VIP 4", 99000, 150],
  5 => ["VIP 5", 150000, 300],
  6 => ["VIP 6", 300000, 999],
  7 => ["VIP 7", 500000, -1]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $vip = intval($_POST['vip']);
  if (isset($vip_packages[$vip])) {
    $selected = $vip_packages[$vip];
    $stmt = $db->prepare("UPDATE users SET vip_level = ?, remaining_uses = ? WHERE id = ?");
    $stmt->execute([$vip, $selected[2], $user['id']]);
    $msg = "✅ Đã mua gói " . $selected[0];
    $user['vip_level'] = $vip;
    $user['remaining_uses'] = $selected[2];
  }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Mua Gói VIP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="form-container">
  <h2>💎 Mua Gói VIP</h2>

  <?php if (isset($msg)): ?>
    <p style="color: green; font-weight: bold;"><?= $msg ?></p>
  <?php endif; ?>

  <p>👤 <strong><?= htmlspecialchars($user['username']) ?></strong> | VIP hiện tại: <?= $user['vip_level'] ?> | Lượt: <?= $user['remaining_uses'] ?></p>

  <form method="POST">
    <select name="vip" required>
      <?php foreach ($vip_packages as $id => $pkg): ?>
        <option value="<?= $id ?>">
          <?= $pkg[0] ?> - <?= number_format($pkg[1]) ?>đ (<?= $pkg[2] == -1 ? 'Không giới hạn' : $pkg[2] . ' lượt' ?>)
        </option>
      <?php endforeach; ?>
    </select>
    <br><br>
    <button class="btn vip">💰 Mua Ngay</button>
  </form>
</div>
</body>
</html>
