<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_info_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_data";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View All Records</title>
</head>
<body>
    <h1>Stored Records</h1>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Reference</th>
            <th>Places</th>
            <th>Budget</th>
            <th>Preference</th>
            <th>Delete</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['reference']}</td>
                    <td>{$row['places']}</td>
                    <td>{$row['budget']}</td>
                    <td>{$row['preference']}</td>
                    <td><a href='delete_record.php?id={$row['id']}'>Delete</a></td>
                </tr>";
            }
        }
        ?>
    </table>
    <br>
    <a href="form.html">Back to Form</a>
</body>
</html>

<?php
$conn->close();
?>

        
