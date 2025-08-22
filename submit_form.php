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
$username = trim($_POST["username"]);
$gender = trim($_POST["gender"]);
$email = trim($_POST["email"]);
$phone = trim($_POST["phone"]);
$reference = trim($_POST["reference"]);
$places = trim($_POST["places"]);
$budget = trim($_POST["budget"]);
$preference = trim($_POST["preference"]);

$stmt = $conn->prepare("INSERT INTO user_data (name, username, gender, email, phone, reference, places, budget, preference) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssssss", $name, $username, $gender, $email, $phone, $reference, $places, $budget, $preference);
$stmt->execute();
$stmt->close();

setcookie("name", $name, time() + 600, "/");
setcookie("username", $username, time() + 600, "/");
setcookie("gender", $gender, time() + 600, "/");
setcookie("email", $email, time() + 600, "/");
setcookie("phone", $phone, time() + 600, "/");
setcookie("reference", $reference, time() + 600, "/");
setcookie("places", $places, time() + 600, "/");
setcookie("budget", $budget, time() + 600, "/");
setcookie("preference", $preference, time() + 600, "/");

$conn->close();

header("Location: success.html");
exit();
?>
