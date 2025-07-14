<?php require_once __DIR__ . '/core/user.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Tool Lọc Bạn Bè Facebook</title>
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<!-- Nút 3 gạch góc trái -->
<div id="menu-toggle">☰</div>

<!-- Menu bên trái -->
<div id="side-menu" style="display:none;">
  <ul>
    <li><a href="index.php">🏠 Trang chủ</a></li>
    <?php if (!current_user()): ?>
      <li><a href="auth/login.php">🔐 Đăng nhập</a></li>
      <li><a href="auth/register.php">📝 Đăng ký</a></li>
    <?php else: ?>
      <li><a href="vip/buy_vip.php">🔓 Mua VIP</a></li>
      <li><a href="auth/logout.php">🚪 Đăng xuất</a></li>
    <?php endif; ?>
  </ul>
</div>

<!-- Nội dung chính -->
<div style="margin-left: 20px;">
  <h2>🎯 Tool Lọc Bạn Bè Facebook</h2>

  <?php if (!current_user()): ?>
    <p>🔔 Vui lòng <a href="auth/login.php">đăng nhập</a> để sử dụng công cụ.</p>
  <?php else: ?>
    <p>👋 Xin chào <b><?= current_user()['username'] ?></b></p>
    <p>🎫 Lượt sử dụng còn lại:
      <b style="color:green">
        <?= current_user()['vip_level'] == 7 ? "Không giới hạn" : current_user()['remaining_uses'] ?>
      </b>
    </p>

    <form method="POST" action="tool/get_friends.php">
      <textarea name="cookie" rows="4" cols="50" placeholder="Dán cookie Facebook tại đây..."></textarea><br><br>
      <button>Lọc bạn bè</button>
    </form>
    <br>
    <a href="vip/buy_vip.php">💎 Nâng cấp VIP để dùng nhiều lượt hơn!</a>
  <?php endif; ?>
</div>

<!-- JS mở menu -->
<script src="assets/menu.js"></script>
</body>
</html>
