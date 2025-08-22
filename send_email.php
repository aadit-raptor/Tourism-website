<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$result = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $destination = $_POST['destination'];
    $message = $_POST['message'];
    $subject = "More Information about " . $destination;

    $result = sendEmail($to, $subject, $message);
}

function sendEmail($to, $subject, $message) {
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'aadit.pagare@somaiya.edu';
        $mail->Password = 'mhmt cjuk gzzy snvo';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
        $mail->setFrom('binodsharma420420@gmail.com', 'Voyage Vista');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = nl2br(htmlspecialchars($message));
        $mail->send();
        return 'Email sent successfully.';
    } catch (Exception $e) {
        return "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore Trips - Voyage Vista</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">
    <style>
        body {
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h1 {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #fff;
            background-color: #0d406e;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between; 
        }
        .destination {
            width: calc(33.33% - 20px); 
            margin-bottom: 40px;
            text-align: left;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box; 
        }
        .destination img {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            width: 100%;
            height: 20vh;
        }
        .destination h2 {
            margin-bottom: 10px;
            color: #3e64ff;
        }
        .destination p {
            line-height: 1.6;
        }
        .btn {
            background-color: #3e64ff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #1f3f9e;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            color: #28a745;
        }
    </style>
</head>
<body>
    <h1>Explore Trips</h1>
    <div class="container">
        <div class="destination">
            <img src="paris.jpg" alt="Paris">
            <h2>Paris</h2>
            <p>Duration: 7 days</p>
            <p>Approximate Cost: $2000</p>
            <p>Mode of Travel: Flight</p>
            <p>Activities: Visit the Eiffel Tower, Louvre Museum, Seine River Cruise</p>
            <form method="POST" action="">
                <input type="hidden" name="to" value="info@voyage.vista.com">
                <input type="hidden" name="destination" value="Paris">
                <input type="hidden" name="message" value="I am interested in learning more about Paris. Could you please provide me with more details?">
                <button type="submit" class="btn">Know More!</button>
            </form>
        </div>
        <div class="destination">
            <img src="tokyo.jpg" alt="Tokyo">
            <h2>Tokyo</h2>
            <p>Duration: 5 days</p>
            <p>Approximate Cost: $2500</p>
            <p>Mode of Travel: Plane</p>
            <p>Activities: Experience Shibuya Crossing, Tokyo Disneyland, Asakusa Temple</p>
            <form method="POST" action="">
                <input type="hidden" name="to" value="info@voyage.vista.com">
                <input type="hidden" name="destination" value="Tokyo">
                <input type="hidden" name="message" value="I am interested in learning more about Tokyo. Could you please provide me with more details?">
                <button type="submit" class="btn">Know More!</button>
            </form>
        </div>
        <div class="destination">
            <img src="newyork.jpg" alt="New York">
            <h2>New York</h2>
            <p>Duration: 6 days</p>
            <p>Approximate Cost: $2800</p>
            <p>Mode of Travel: Plane</p>
            <p>Activities: Statue of Liberty, Central Park, Times Square</p>
            <form method="POST" action="">
                <input type="hidden" name="to" value="info@voyage.vista.com">
                <input type="hidden" name="destination" value="New York">
                <input type="hidden" name="message" value="I am interested in learning more about New York. Could you please provide me with more details?">
                <button type="submit" class="btn">Know More!</button>
            </form>
        </div>
        <div class="destination">
            <img src="kashmir.jpg" alt="Kashmir">
            <h2>Kashmir</h2>
            <p>Duration: 10 days</p>
            <p>Approximate Cost: $1500</p>
            <p>Mode of Travel: Train</p>
            <p>Activities: Explore Dal Lake, Visit Mughal Gardens, Gulmarg Skiing</p>
            <form method="POST" action="">
                <input type="hidden" name="to" value="info@voyage.vista.com">
                <input type="hidden" name="destination" value="Kashmir">
                <input type="hidden" name="message" value="I am interested in learning more about Kashmir. Could you please provide me with more details?">
                <button type="submit" class="btn">Know More!</button>
            </form>
        </div>
        <div class="destination">
            <img src="maldives.jpg" alt="Maldives">
            <h2>Maldives</h2>
            <p>Duration: 8 days</p>
            <p>Approximate Cost: $3000</p>
            <p>Mode of Travel: Seaplane</p>
            <p>Activities: Snorkeling, Relaxing on Private Beaches, Sunset Cruises</p>
            <form method="POST" action="">
                <input type="hidden" name="to" value="info@voyage.vista.com">
                <input type="hidden" name="destination" value="Maldives">
                <input type="hidden" name="message" value="I am interested in learning more about Maldives. Could you please provide me with more details?">
                <button type="submit" class="btn">Know More!</button>
            </form>
        </div>
        <div class="destination">
            <img src="bali.jpg" alt="Bali">
            <h2>Bali</h2>
            <p>Duration: 7 days</p>
            <p>Approximate Cost: $1800</p>
            <p>Mode of Travel: Flight</p>
            <p>Activities: Ubud Monkey Forest, Tanah Lot Temple, Surfing in Kuta</p>
            <form method="POST" action="">
                <input type="hidden" name="to" value="info@voyage.vista.com">
                <input type="hidden" name="destination" value="Bali">
                <input type="hidden" name="message" value="I am interested in learning more about Bali. Could you please provide me with more details?">
                <button type="submit" class="btn">Know More!</button>
            </form>
        </div>
    </div>
    <?php if ($result): ?>
        <div class="result"><?= $result ?></div>
    <?php endif; ?>
</body>
</html>
