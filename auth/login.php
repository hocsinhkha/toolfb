<?php
session_start();
require_once '../core/db.php';
require_once '../core/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $user = loginUser($username, $password);
    if ($user) {
        $_SESSION['user'] = $user;
        header('Location: /');
        exit;
    } else {
        $error = "Sai tài khoản hoặc mật khẩu.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng nhập - Tool Facebook VIP</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="form-container">
  <h2>🔐 Đăng nhập</h2>
  <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
  <form method="POST">
    <input type="text" name="username" placeholder="👤 Tên đăng nhập" required>
    <input type="password" name="password" placeholder="🔒 Mật khẩu" required>
    <button class="btn">Đăng nhập</button>
  </form>
  <p>Chưa có tài khoản? <a href="register.php">Đăng ký</a></p>
</div>
</body>
</html>
