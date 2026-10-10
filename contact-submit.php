<?php
// Contact form handler for ACE Precision Technology.
// Requires PHP hosting with mail() / outgoing email configured.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.html');
    exit;
}
function clean_line($value) {
    return trim(str_replace(["\r", "\n"], ' ', (string)$value));
}
$name = clean_line($_POST['name'] ?? '');
$email = trim((string)($_POST['email'] ?? ''));
$phone = clean_line($_POST['phonenumber'] ?? '');
$message = trim((string)($_POST['message'] ?? ''));
$honeypot = trim((string)($_POST['website'] ?? ''));
if ($honeypot !== '') { http_response_code(400); exit('Invalid submission.'); }
if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || $message === '' || strlen($name) > 120 || strlen($email) > 254 || strlen($phone) > 40 || strlen($message) > 10000) {
    http_response_code(400);
    exit('Please check your name, email address, and message, then try again.');
}
$to = 'ace@aceprectech.com';
$subject = 'Website contact form - ' . $name;
$body = "A new message was submitted through the ACE website contact form.\n\n" .
        "Name: {$name}\nEmail: {$email}\nPhone Number: {$phone}\n\nMessage:\n{$message}\n";
$host = preg_replace('/[^a-zA-Z0-9.-]/', '', $_SERVER['HTTP_HOST'] ?? 'aceprectech.com');
$headers = "From: website@" . ($host !== '' ? $host : 'aceprectech.com') . "\r\n" .
           "Reply-To: {$email}\r\n" .
           "Content-Type: text/plain; charset=UTF-8\r\n";
if (mail($to, $subject, $body, $headers)) {
    header('Location: contact.html?sent=1#contact-form-title');
    exit;
}
http_response_code(500);
echo 'Sorry, your message could not be sent right now. Please email ace@aceprectech.com directly.';
?>
