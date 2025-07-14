<?php
require_once '../core/db.php';
require_once '../core/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $success = registerUser($username, $password);
    if ($success) {
        header('Location: login.php');
        exit;
    } else {
        $error = "Tên đăng nhập đã tồn tại.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Đăng ký - Tool Facebook VIP</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="form-container">
  <h2>📝 Đăng ký</h2>
  <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
  <form method="POST">
    <input type="text" name="username" placeholder="👤 Tên đăng nhập" required>
    <input type="password" name="password" placeholder="🔒 Mật khẩu" required>
    <button class="btn">Đăng ký</button>
  </form>
  <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
</div>
</body>
</html>
