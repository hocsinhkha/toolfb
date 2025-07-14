<?php
session_start();
$admin_password = 'thahsiucapvippro03@';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "❌ Sai mật khẩu!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Đăng nhập Admin</title>
</head>
<body>
  <h2>🔐 Đăng nhập quản trị</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="post">
    <input type="password" name="password" placeholder="Mật khẩu admin">
    <button type="submit">Đăng nhập</button>
  </form>
</body>
</html>
