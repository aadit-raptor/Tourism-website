<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['email'] = $email;
    header("Location: success.html");
    exit();
} else {
    echo "Invalid credentials. Please try again.";
}

$stmt->close();
$conn->close();
?>
