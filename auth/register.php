<?php
require_once __DIR__ . '/../core/db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->execute([$u, $p]);
    echo "Đăng ký thành công! <a href='login.php'>Đăng nhập</a>";
}
?>
<form method="POST">
  <h3>Đăng ký</h3>
  <input name="username" placeholder="Username"><br>
  <input name="password" type="password" placeholder="Mật khẩu"><br>
  <button>Đăng ký</button>
</form>
