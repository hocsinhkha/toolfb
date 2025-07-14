<?php
session_start();
$admin_password = 'thahsiucapvippro03@'; // đổi tại đây

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = "Sai mật khẩu!";
    }
}
?>
<h2>Đăng nhập admin</h2>
<form method="POST">
    <input type="password" name="password" placeholder="Mật khẩu admin">
    <button type="submit">Đăng nhập</button>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>
