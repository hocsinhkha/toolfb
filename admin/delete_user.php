<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
require_once __DIR__ . '/../core/db.php';

$id = $_GET['id'] ?? null;
if (!$id) die("Thiếu ID user.");

$db->prepare("DELETE FROM users WHERE id = :id")->execute(['id' => $id]);
header('Location: admin.php');
