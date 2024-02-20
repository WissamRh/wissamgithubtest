<?php
// SMTP server configuration for Gmail
$smtp_server = "smtp.gmail.com";
$smtp_port = 587; // Gmail SMTP port (TLS)
$smtp_username = "elie.r.tahchi@gmail.com"; // Your Gmail email address
$smtp_password = "Labmwlabest?!1?!"; // Your Gmail password

// Sender and recipient email addresses
$from_email = "elie.r.tahchi@gmail.com"; // Your Gmail email address
$to_email = "najaboughadar@gmail.com"; // Recipient email address

// Email subject and message
$subject = "Test Email via SMTP";
$message = "This is a test email sent via SMTP using PHP.";

// Additional headers
$headers = "From: $from_email\r\n";
$headers .= "Reply-To: $from_email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Enable TLS encryption
$smtp_encryption = "tls";

// SMTP authentication
$smtp_auth = true;



// SMTP configuration
$mail->isSMTP();
$mail->Host = $smtp_server;
$mail->Port = $smtp_port;
$mail->SMTPAuth = $smtp_auth;
$mail->Username = $smtp_username;
$mail->Password = $smtp_password;
$mail->SMTPSecure = $smtp_encryption;

// Sender and recipient
$mail->setFrom($from_email);
$mail->addAddress($to_email);

// Email content
$mail->isHTML(false); // Set email format to plain text
$mail->Subject = $subject;
$mail->Body = $message;

// Send the email
if ($mail->send()) {
    echo "Test email sent successfully via SMTP!";
} else {
    echo "Failed to send test email via SMTP. Error: " . $mail->ErrorInfo;
}
?>
