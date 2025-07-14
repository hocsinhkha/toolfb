<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>TOOL FACEBOOK VIP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<!-- Nút mở menu -->
<div id="menu-toggle">☰</div>

<!-- Menu bên trái -->
<nav id="side-menu" class="hidden">
  <div id="menu-close">✖</div>
  <ul>
    <li><a href="index.php">🏠 Trang chủ</a></li>
    <li><a href="tool/get_friends.php">👥 Lọc bạn bè</a></li>
    <li><a href="vip/buy_vip.php">💎 Mua VIP</a></li>
    <li><a href="auth/login.php">🔐 Đăng nhập</a></li>
    <li><a href="admin/login.php">⚙️ Admin</a></li>
  </ul>
</nav>

<!-- Nội dung chính -->
<div class="container">
  <div class="header">
    <h1>🌟 TOOL FACEBOOK VIP 🌟</h1>
    <p>Chào mừng bạn đến với công cụ lọc bạn bè chuyên nghiệp</p>
  </div>

  <div class="actions">
    <a href="tool/get_friends.php" class="btn">Dùng thử miễn phí</a>
    <a href="vip/buy_vip.php" class="btn vip">Nâng cấp VIP</a>
  </div>
</div>

<script src="assets/menu.js"></script>
</body>
</html>
