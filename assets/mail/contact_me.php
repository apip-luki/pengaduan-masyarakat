<?php
// Check for empty fields
if (empty($_POST['judul']) || empty($_POST['tanggal']) || empty($_POST['laporan']) || empty($_POST['upload'])) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['judul']));
$email = strip_tags(htmlspecialchars($_POST['tanggal']));
$phone = strip_tags(htmlspecialchars($_POST['laporan']));
$message = strip_tags(htmlspecialchars($_POST['upload']));

// Create the email and send the message
$to = "yourname@yourdomain.com"; // Add your email address in between the "" replacing yourname@yourdomain.com - This is where the form will send a message to.
$subject = "Website Contact Form:  $name";
$body = "You have received a new message from your website contact form.\n\n" . "Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$header = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$header .= "Reply-To: $email";

if (!mail($to, $subject, $body, $header))
  http_response_code(500);
