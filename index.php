<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>🔥 TOOL FACEBOOK VIP 🔥</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/assets/style.css">
  <script src="/assets/menu.js" defer></script>
</head>
<body>
  <div id="menu-toggle">☰</div>
  <nav id="side-menu" class="hidden">
    <div id="close-menu">✖</div>
    <ul>
      <li><a href="/">🏠 Trang chủ</a></li>
      <li><a href="/tool/get_friends.php">🛠️ Tool miễn phí</a></li>
      <li><a href="/vip/buy_vip.php">💎 Mua VIP</a></li>
      <!-- Ẩn nếu không đăng nhập -->
      <?php if (!isset($_SESSION['user'])): ?>
      <li><a href="/auth/login.php">🔐 Đăng nhập</a></li>
      <?php endif; ?>
      <?php if (isset($_SESSION['user']) && $_SESSION['user']['vip_level'] >= 7): ?>
      <li><a href="/admin/admin.php">⚙️ Admin</a></li>
      <?php endif; ?>
    </ul>
  </nav>

  <header class="header-banner">
    <h1>🌟 TOOL FACEBOOK VIP 🌟</h1>
    <p>Chào mừng đến với hệ thống Tool Facebook</p>
    <p>Dùng thử miễn phí <b>2 lượt</b>. Mua VIP để mở khoá full tính năng cực hot!</p>
    <a href="/tool/get_friends.php" class="btn">Dùng thử ngay</a>
    <a href="/vip/buy_vip.php" class="btn vip">Nâng cấp VIP</a>
  </header>
</body>
</html>
