<?php
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

if ($user_id) {
    $url = "http://localhost/minipro/get_preferences.php?user_id=" . urlencode($user_id);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);

    if ($response === false) {
        echo json_encode(["error" => "cURL error: " . curl_error($ch)]);
    } else {
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($httpCode == 200) {
            echo $response;
        } else {
            echo json_encode(["error" => "Failed to retrieve data, HTTP Code: $httpCode"]);
        }
    }
    curl_close($ch);
} else {
    echo json_encode(["error" => "No user ID provided."]);
}
?>
