<?php
require_once __DIR__ . '/core/db.php';

// Tạo bảng users
$db->exec("
CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  username TEXT,
  password TEXT,
  vip_level INTEGER DEFAULT 0,
  remaining_uses INTEGER DEFAULT 2
)");

// Tạo bảng vip_packages
$db->exec("
CREATE TABLE IF NOT EXISTS vip_packages (
  id SERIAL PRIMARY KEY,
  name TEXT,
  price INTEGER,
  uses INTEGER
)");

echo "✅ PostgreSQL đã tạo bảng `users` và `vip_packages` thành công.";
