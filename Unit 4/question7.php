<?php
// Include PHPMailer (update the path based on your project structure)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = "";
$success = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // Sanitize email
    $email = trim($_POST['email']);

    // Validate email
    if (empty($email)) {
        $error = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    }

    // If no validation errors → send email
    if (empty($error)) {
        $mail = new PHPMailer(true);

        try {
            // SMTP settings (Mailtrap)
            $mail->isSMTP();
            $mail->Host = "smtp.mailtrap.io";
            $mail->SMTPAuth = true;
            $mail->Username = "MAILTRAP_USERNAME";  // replace
            $mail->Password = "MAILTRAP_PASSWORD";  // replace
            $mail->Port = 2525;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

            // Sender & Recipient
            $mail->setFrom("newsletter@example.com", "Newsletter Service");
            $mail->addAddress($email);

            // Email content
            $mail->isHTML(true);
            $mail->Subject = "Subscription Confirmation";
            $mail->Body = "
                <h3>Thank you for subscribing!</h3>
                <p>You will now receive updates from our newsletter.</p>
            ";

            // Send mail
            $mail->send();
            $success = "Success! A confirmation email has been sent to $email.";
            $email = ""; // Clear field after success

        } catch (Exception $e) {
            $error = "Mailer Error: " . $mail->ErrorInfo;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Newsletter Subscription</title>
</head>
<body>

<h2>Subscribe to our Newsletter</h2>

<!-- Display messages -->
<?php if ($error): ?>
    <p style="color:red;"><strong><?php echo $error; ?></strong></p>
<?php endif; ?>

<?php if ($success): ?>
    <p style="color:green;"><strong><?php echo $success; ?></strong></p>
<?php endif; ?>

<!-- Subscription Form -->
<form method="POST" action="">
    <label>Email:</label><br>
    <input type="text" name="email" value="<?php echo htmlspecialchars($email); ?>">
    <br><br>
    <button type="submit">Subscribe</button>
</form>

</body>
</html>
