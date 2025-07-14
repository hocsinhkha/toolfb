<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>TOOL FACEBOOK VIP</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <script src="menu.js" defer></script>
</head>
<body>

<!-- Nút mở menu -->
<div id="menu-toggle">☰</div>

<!-- Menu bên trái -->
<nav id="side-menu" class="hidden">
  <div id="menu-close">✖</div>
  <ul>
    <li><a href="index.php">🏠 Trang chủ</a></li>
    <li><a href="free.php">🛠 Tool miễn phí</a></li>
    <li><a href="vip.php">💎 Mua VIP</a></li>
    <li><a href="login.php">🔐 Đăng nhập</a></li>
    <li><a href="admin/login.php">⚙️ Admin</a></li>
  </ul>
</nav>

<!-- Phần đầu trang -->
<div class="header">
  <img src="https://ibb.co/mr4KW7sC" alt="Banner" class="banner">
  <h1 class="logo">🌟 TOOL FACEBOOK VIP 🌟</h1>
</div>

<!-- Nội dung chính -->
<div class="content">
  <h2>Chào mừng đến với hệ thống Tool Facebook</h2>
  <p>Dùng thử miễn phí <strong>2 lượt</strong>. Mua VIP để mở khoá full tính năng cực hot!</p>
  <button class="btn">Dùng thử ngay</button>
  <button class="btn vip">Nâng cấp VIP</button>
</div>

</body>
</html>
