<?php
require_once __DIR__ . '/../core/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];
    $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$u]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($p, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../index.php");
    } else echo "Sai thông tin đăng nhập.";
}
?>
<form method="POST">
  <h3>Đăng nhập</h3>
  <input name="username" placeholder="Username"><br>
  <input name="password" type="password" placeholder="Mật khẩu"><br>
  <button>Đăng nhập</button>
</form>
