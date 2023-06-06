<?php
include('saveemail.php');
// Retrieve form data
$recipientEmail = $_POST['recipient_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$attachment = $_FILES['attachment'];

// Sanitize and validate the input data as needed

// Prepare email headers
$headers = "From: aliyankhan6446@gmail.com"; // Replace with the sender's email address
$headers .= "LawSeer CMS\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=boundary123\r\n";

// Prepare email subject and body
$emailSubject = "New email: $subject";
$emailBody = "--boundary123\r\n";
$emailBody .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
$emailBody .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$emailBody .= "<h1>New email</h1>";
$emailBody .= "<p>$message</p>\r\n\r\n";
$emailBody .= "--boundary123\r\n";
$emailBody .= "Content-Type: application/octet-stream; name=\"$attachment[name]\"\r\n";
$emailBody .= "Content-Transfer-Encoding: base64\r\n";
$emailBody .= "Content-Disposition: attachment\r\n\r\n";
$emailBody .= chunk_split(base64_encode(file_get_contents($attachment['tmp_name'])));
$emailBody .= "--boundary123--";

// Send the email
$mailSent = mail($recipientEmail, $emailSubject, $emailBody, $headers);

// Check if the email was sent successfully
if ($mailSent) {
    
    save($recipientEmail,$subject, $headers,$message);
    
} else {
    echo "Failed to send email.";
}


?>
