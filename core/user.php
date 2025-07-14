<?php
// Chỉ khởi động session nếu chưa chạy
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/db.php';

// Hàm đăng nhập
function loginUser($username, $password) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['is_admin'] = $user['is_admin'];
        return true;
    }
    return false;
}

// Hàm đăng ký
function registerUser($username, $password) {
    global $pdo;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password, is_admin) VALUES (:username, :password, 0)");
    return $stmt->execute([
        'username' => $username,
        'password' => $hashedPassword
    ]);
}

// Hàm kiểm tra đăng nhập
function isLoggedIn() {
    return isset($_SESSION['username']);
}

// Hàm kiểm tra quyền admin
function isAdmin() {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
}

// Hàm đăng xuất
function logoutUser() {
    session_unset();
    session_destroy();
}
