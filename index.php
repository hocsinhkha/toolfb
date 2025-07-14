<?php
session_start();
$isLoggedIn = isset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>TOOL FACEBOOK VIP</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
  <!-- Nút mở menu -->
  <div id="menu-toggle">☰</div>

  <!-- Menu bên trái -->
  <div id="side-menu">
    <h3>
      MENU <span id="menu-close">✖</span>
    </h3>
    <ul>
      <li><a href="/index.php">🏠 Trang chủ</a></li>
      <li><a href="/tool/get_friends.php">🛠 Tool miễn phí</a></li>
      <li><a href="/vip/buy_vip.php">💎 Mua VIP</a></li>
      <?php if (!$isLoggedIn): ?>
        <li><a href="/auth/login.php">🔐 Đăng nhập</a></li>
        <li><a href="/auth/register.php">📝 Đăng ký</a></li>
      <?php else: ?>
        <li><a href="/auth/logout.php">🚪 Đăng xuất</a></li>
      <?php endif; ?>
    </ul>
  </div>

  <!-- Nội dung trang chủ -->
  <div class="container">
    <h1>✨ TOOL FACEBOOK VIP ✨</h1>
    <h2>Chào mừng đến với hệ thống Tool Facebook</h2>
    <p>Dùng thử miễn phí <strong>2 lượt</strong>. Mua VIP để mở khoá full tính năng cực hot!</p>
    <div class="button-container">
      <a href="/tool/get_friends.php" class="btn">Dùng thử ngay</a>
      <a href="/vip/buy_vip.php" class="btn vip">Nâng cấp VIP</a>
    </div>
  </div>

  <!-- Script mở/đóng menu -->
  <script src="/assets/menu.js"></script>
</body>
</html>
