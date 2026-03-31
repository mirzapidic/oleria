<?php

declare(strict_types=1);

header('Content-Type: application/json; charset=UTF-8');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/../vendor/autoload.php';

function respond(array $data, int $statusCode = 200): void
{
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}

function cleanText(string $value): string
{
    return trim($value);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond([
        'success' => false,
        'error' => 'Method not allowed'
    ], 405);
}

$name    = cleanText($_POST['name'] ?? '');
$company = cleanText($_POST['company'] ?? '');
$email   = cleanText($_POST['email'] ?? '');
$phone   = cleanText($_POST['phone'] ?? '');
$message = cleanText($_POST['message'] ?? '');

// Basic validation
if ($name === '' || $company === '' || $email === '' || $phone === '') {
    respond([
        'success' => false,
        'error' => 'Please fill in all required fields'
    ], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    respond([
        'success' => false,
        'error' => 'Invalid email address'
    ], 422);
}

// Optional length limits
if (mb_strlen($name) > 100 || mb_strlen($company) > 150 || mb_strlen($email) > 200 || mb_strlen($phone) > 50 || mb_strlen($message) > 5000) {
    respond([
        'success' => false,
        'error' => 'Input too long'
    ], 422);
}

// Load config
$envPath = __DIR__ . '/../.env';

if (!file_exists($envPath)) {
    respond([
        'success' => false,
        'error' => 'Server configuration missing'
    ], 500);
}

$ini = parse_ini_file($envPath);

if (
    $ini === false ||
    empty($ini['SMTP_USER']) ||
    empty($ini['SMTP_PASS']) ||
    empty($ini['RECEIVER'])
) {
    respond([
        'success' => false,
        'error' => 'Server configuration invalid'
    ], 500);
}

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $ini['SMTP_USER'];
    $mail->Password = $ini['SMTP_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom($ini['SMTP_USER'], 'Oleria');
    $mail->addAddress($ini['RECEIVER']);
    $mail->addReplyTo($email, $name);

    $mail->Subject = 'Neue Anfrage von Oleria Website';

    $body  = "Name: {$name}\n";
    $body .= "Firma: {$company}\n";
    $body .= "E-Mail: {$email}\n";
    $body .= "Telefon: {$phone}\n\n";
    $body .= "Nachricht:\n{$message}\n";

    $mail->Body = $body;

    $mail->send();

    respond(['success' => true]);
} catch (Exception $e) {
    error_log('Contact form mail error: ' . $mail->ErrorInfo);

    respond([
        'success' => false,
        'error' => 'Message could not be sent'
    ], 500);
}