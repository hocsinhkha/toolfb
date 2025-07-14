<?php session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tool Facebook VIP</title>
  <link rel="stylesheet" href="style.css">
  <script src="menu.js" defer></script>
</head>
<body>

<!-- Nút menu 3 gạch -->
<div id="menu-toggle">☰</div>

<!-- Menu trượt -->
<nav id="side-menu" class="hidden">
  <div id="menu-close">✖</div>
  <ul>
    <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Tool miễn phí</a></li>
    <li><a href="#">Mua VIP</a></li>
    <li><a href="#">Đăng nhập</a></li>
    <li><a href="#">Admin</a></li>
  </ul>
</nav>

<!-- Header -->
<div class="header">
  <img src="https://i.imgur.com/NpZ3cDU.jpg" alt="Banner" class="banner">
  <h1 class="logo">🔥 TOOL FACEBOOK VIP 🔥</h1>
</div>

<!-- Nội dung -->
<div class="content">
  <h2>Xin chào đến với Tool Facebook VIP</h2>
  <p>Bạn có thể dùng thử <strong>2 lần miễn phí</strong>. Sau đó, hãy <strong>mua VIP</strong> để mở khoá full tính năng nhé!</p>
  <button class="btn">Dùng thử miễn phí</button>
  <button class="btn vip">Nâng cấp VIP</button>
</div>

</body>
</html>
