<?php
require_once __DIR__ . '/../core/user.php';

if (!current_user()) die("Chưa đăng nhập!");
if (!use_tool()) die("Hết lượt dùng. Hãy mua VIP!");

echo "Danh sách bạn bè (giả lập)";
