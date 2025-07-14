<?php
require_once __DIR__ . '/core/db.php';

$db->exec("CREATE TABLE IF NOT EXISTS users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  username TEXT,
  password TEXT,
  vip_level INTEGER DEFAULT 0,
  remaining_uses INTEGER DEFAULT 2
);");

$db->exec("CREATE TABLE IF NOT EXISTS vip_packages (
  id INTEGER PRIMARY KEY,
  name TEXT,
  price INTEGER,
  uses INTEGER
);");

$db->exec("INSERT OR IGNORE INTO vip_packages (id, name, price, uses) VALUES
(1, 'VIP 1 - 5k', 5000, 3),
(2, 'VIP 2 - 20k', 20000, 20),
(3, 'VIP 3 - 50k', 50000, 70),
(4, 'VIP 4 - 99k', 99000, 150),
(5, 'VIP 5 - 150k', 150000, 300),
(6, 'VIP 6 - 300k', 300000, 999),
(7, 'VIP 7 - 500k', 500000, -1);");

echo "✅ Đã tạo CSDL xong! Hãy xoá file này sau khi tạo.";
