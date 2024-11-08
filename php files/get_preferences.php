<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : '';

if ($user_id) {
    $stmt = $conn->prepare("SELECT name, username, gender, email, phone, reference, places, budget, preference FROM user_data WHERE username = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        echo json_encode($data);
    } else {
        echo json_encode(["error" => "User not found."]);
    }

    $stmt->close();
} else {
    echo json_encode(["error" => "No user ID provided."]);
}

$conn->close();
?>
