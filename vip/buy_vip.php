<?php
require_once __DIR__ . '/../core/db.php';
require_once __DIR__ . '/../core/user.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vip_id = (int)$_POST['vip_id'];
    $stmt = $db->prepare("SELECT * FROM vip_packages WHERE id = ?");
    $stmt->execute([$vip_id]);
    $vip = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$vip) die("Gói VIP không tồn tại");
    $stmt = $db->prepare("UPDATE users SET vip_level = ?, remaining_uses = ? WHERE id = ?");
    $stmt->execute([$vip_id, $vip['uses'], $_SESSION['user_id']]);
    echo "Đã mua gói VIP: {$vip['name']}";
}
?>
<form method="POST">
  <select name="vip_id">
    <option value="1">VIP 1 - 5k</option>
    <option value="2">VIP 2 - 20k</option>
    <option value="3">VIP 3 - 50k</option>
    <option value="4">VIP 4 - 99k</option>
    <option value="5">VIP 5 - 150k</option>
    <option value="6">VIP 6 - 300k</option>
    <option value="7">VIP 7 - 500k (không giới hạn)</option>
  </select>
  <button>Mua VIP</button>
</form>
