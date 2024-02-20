<?php
// Sender and recipient email addresses
$from_email = "elie.r.tahchi@gmail.com"; // Replace with your Gmail email address
$to_email = "elie.r.tahchi@example.com"; // Replace with the recipient's email address

// Email subject and message
$subject = "Test Email via Gmail SMTP";
$message = "This is a test email sent via Gmail SMTP using PHP.";

// Additional headers
$headers = "From: $from_email\r\n";
$headers .= "Reply-To: $from_email\r\n";
$headers .= "X-Mailer: PHP/" . phpversion();

// Gmail SMTP server configuration
$smtp_server = "ssl://smtp.gmail.com";
$smtp_port = 25;
$smtp_username = "elie.r.tahchi@gmail.com"; // Replace with your Gmail email address
$smtp_password = "Labmwlabest?!1?!"; // Replace with your Gmail password

// Send the email
if (mail($to_email, $subject, $message, $headers, "-f $from_email")) {
    echo "Test email sent successfully!";
} else {
    echo "Failed to send test email. Check your server configuration.";
}
?>
