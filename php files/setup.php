<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "user_info_db";  

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database '$dbname' created successfully or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$userDataTable = "CREATE TABLE IF NOT EXISTS user_data (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    gender ENUM('male', 'female') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    reference ENUM('friend', 'search_engine', 'social_media', 'advertisement', 'other') NOT NULL,
    places TEXT,
    budget VARCHAR(50) NOT NULL,
    preference ENUM('beach', 'cityscape', 'mountains', 'others') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$usersTable = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($userDataTable) === TRUE) {
    echo "Table 'user_data' created successfully.<br>";
} else {
    die("Error creating 'user_data' table: " . $conn->error);
}

if ($conn->query($usersTable) === TRUE) {
    echo "Table 'users' created successfully.<br>";
} else {
    die("Error creating 'users' table: " . $conn->error);
}

$conn->close();
?>
