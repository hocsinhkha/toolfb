<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cookie = $_POST['cookie'];
    $url = "https://mbasic.facebook.com/me/friends";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Cookie: $cookie",
        "User-Agent: Mozilla/5.0 (Linux; Android 10)"
    ));
    $html = curl_exec($ch);
    curl_close($ch);

    preg_match_all('/\/[a-zA-Z0-9\.]+\/friends\?[^"]+">([^<]+)<\/a>/', $html, $matches);

    $friends = [];
    if (isset($matches[1])) {
        foreach ($matches[1] as $index => $name) {
            $friends[] = [
                'name' => $name,
                'link' => 'https://facebook.com' . $matches[0][$index]
            ];
        }
    }

    header('Content-Type: application/json');
    echo json_encode($friends);
}
?>
