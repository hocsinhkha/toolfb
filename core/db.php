<?php
try {
    $db = new PDO(
        "pgsql:host=dpg-d1qfuvbe5dus73e7gdug-a;port=5432;dbname=toolfb",
        "toolfb_user",
        "uOhJ10P9CQd2d6O3b0UqpwZyCxYZZXJg"
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Kết nối database thất bại: " . $e->getMessage());
}
