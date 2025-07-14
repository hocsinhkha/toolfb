<?php
require_once 'user.php';

if (!current_user()) {
    die(json_encode(['error' => 'Bạn cần đăng nhập.']));
}

if (!use_tool()) {
    die(json_encode(['error' => 'Bạn đã hết lượt dùng. Hãy mua gói VIP.']));
}

// Xử lý Facebook cookie tại đây...
echo json_encode(['ok' => 'Danh sách bạn bè sẽ hiển thị ở đây (fake demo)']);
