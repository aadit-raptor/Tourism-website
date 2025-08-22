<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = trim($_POST["name"]);
$age = trim($_POST["age"]);
$email = trim($_POST["email"]);
$address = trim($_POST["address"]);
$password = trim($_POST["password"]);

$stmt = $conn->prepare("INSERT INTO users (name, age, email, address, password) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $name, $age, $email, $address, $password);
$stmt->execute();
$stmt->close();
$conn->close();

header("Location: login.html");
exit();
?>
