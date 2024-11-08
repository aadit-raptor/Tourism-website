

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;




require 'vendor/autoload.php';


$result = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $cc = $_POST['cc'];


    $result = sendEmail($to, $subject, $message, $cc);
}


function sendEmail($to, $subject, $message, $cc = '') {
    $mail = new PHPMailer(true);
   
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true;
        $mail->Username = 'aasit.pagare@somaiya.edu'; // SMTP username
        $mail->Password = 'AP@somaiyaedu2003'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to
       
        // Recipients
        $mail->setFrom('binodsharma420420@gmail.com', 'Mailer');
        $mail->addAddress($to); // Add a recipient
       
        if (!empty($cc)) {
            $mail->addCC($cc); // Add CC if provided
        }
       
        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = nl2br(htmlspecialchars($message));


        // Send the email
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
    <title>Email Sender</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin: 15px 0 5px;
        }
        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .result {
            margin-top: 20px;
            text-align: center;
            color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Send Email</h1>
        <form method="POST" action="">
            <label for="to">To:</label>
            <input type="email" id="to" name="to" required>


            <label for="cc">CC:</label>
            <input type="email" id="cc" name="cc">


            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" required>


            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>


            <button type="submit">Send Email</button>
        </form>
       
        <?php if ($result): ?>
            <div class="result"><?php echo $result; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
