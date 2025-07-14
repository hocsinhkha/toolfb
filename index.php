<?php require_once __DIR__ . '/core/user.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>Tool Lọc Bạn Bè</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<?php if (!current_user()): ?>
  <a href="auth/login.php">Đăng nhập</a> | <a href="auth/register.php">Đăng ký</a>
<?php else: ?>
  <p>Xin chào <?= current_user()['username'] ?> | <a href="auth/logout.php">Đăng xuất</a></p>
  <p>Số lượt còn lại: <?= current_user()['vip_level'] == 7 ? "∞" : current_user()['remaining_uses'] ?></p>
  <form method="POST" action="tool/get_friends.php">
    <textarea name="cookie" placeholder="Dán cookie..."></textarea><br>
    <button>Lọc bạn bè</button>
  </form>
  <a href="vip/buy_vip.php">🔓 Mua gói VIP</a>
<?php endif; ?>
</body>
</html>
