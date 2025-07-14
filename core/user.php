<?php
require_once __DIR__ . '/db.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function current_user() {
    global $db;
    if (!isset($_SESSION['user_id'])) return null;
    $stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function use_tool() {
    global $db;
    $user = current_user();
    if (!$user) return false;
    if ($user['vip_level'] == 7) return true;
    if ($user['remaining_uses'] <= 0) return false;

    $stmt = $db->prepare("UPDATE users SET remaining_uses = remaining_uses - 1 WHERE id = ?");
    $stmt->execute([$user['id']]);
    return true;
}
