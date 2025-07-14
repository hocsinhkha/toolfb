<?php
session_start();
if ($_POST['pass'] === 'thahsiucapvippro03@') {
  $_SESSION['admin'] = true;
  header("Location: admin.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
<div class="form-container">
  <h2>🔐 Admin Đăng Nhập</h2>
  <form method="POST">
    <input type="password" name="pass" placeholder="Mật khẩu admin">
    <button class="btn">Đăng Nhập</button>
  </form>
</div>
</body>
</html>
