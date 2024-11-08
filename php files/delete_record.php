<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("DELETE FROM user_data WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
$conn->close();
header("Location: view_records.php");
exit();
?>
