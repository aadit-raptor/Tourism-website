<?php
$name = isset($_COOKIE["name"]) ? htmlspecialchars($_COOKIE["name"]) : "Not set";
$username = isset($_COOKIE["username"]) ? htmlspecialchars($_COOKIE["username"]) : "Not set";
$gender = isset($_COOKIE["gender"]) ? htmlspecialchars($_COOKIE["gender"]) : "Not set";
$email = isset($_COOKIE["email"]) ? htmlspecialchars($_COOKIE["email"]) : "Not set";
$phone = isset($_COOKIE["phone"]) ? htmlspecialchars($_COOKIE["phone"]) : "Not set";
$reference = isset($_COOKIE["reference"]) ? htmlspecialchars($_COOKIE["reference"]) : "Not set";
$places = isset($_COOKIE["places"]) ? htmlspecialchars($_COOKIE["places"]) : "Not set";
$budget = isset($_COOKIE["budget"]) ? htmlspecialchars($_COOKIE["budget"]) : "Not set";
$preference = isset($_COOKIE["preference"]) ? htmlspecialchars($_COOKIE["preference"]) : "Not set";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Cookies</title>
</head>
<body>
    <h1>Stored Cookie Information</h1>
    <p><strong>Name:</strong> <?php echo $name; ?></p>
    <p><strong>Username:</strong> <?php echo $username; ?></p>
    <p><strong>Gender:</strong> <?php echo $gender; ?></p>
    <p><strong>Email:</strong> <?php echo $email; ?></p>
    <p><strong>Phone:</strong> <?php echo $phone; ?></p>
    <p><strong>Reference:</strong> <?php echo $reference; ?></p>
    <p><strong>Places:</strong> <?php echo $places; ?></p>
    <p><strong>Budget:</strong> <?php echo $budget; ?></p>
    <p><strong>Preference:</strong> <?php echo $preference; ?></p>
    <a href="form.html">Back to Form</a>
</body>
</html>
