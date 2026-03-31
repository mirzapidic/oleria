<?php
header("Content-Type: application/json");

// Basic sanitization
function clean($value) {
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
}

$name    = clean($_POST['name'] ?? '');
$company = clean($_POST['company'] ?? '');
$email   = clean($_POST['email'] ?? '');
$phone   = clean($_POST['phone'] ?? '');
$message = clean($_POST['message'] ?? '');

// Server-side validation
if (!$name || !$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "error" => "Invalid input"]);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/phpmailer/src/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/src/SMTP.php';
require __DIR__ . '/phpmailer/src/src/Exception.php';

$mail = new PHPMailer(true);

$ini = parse_ini_file(__DIR__ . '/../.env-oleria');

try {
    // SMTP config (Google Workspace)
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $ini['SMTP_USER'];
    $mail->Password = $ini['SMTP_PASS'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Email
    $mail->setFrom($ini['SMTP_USER'], "Oleria");
    $mail->addAddress($ini['RECEIVER']);
    $mail->Subject = "Neue Anfrage von Oleria Website";

    $body  = "Name: $name\n";
    $body .= "Firma: $company\n";
    $body .= "Email: $email\n";
    $body .= "Telefon: $phone\n\n";
    $body .= "Nachricht:\n$message\n";

    $mail->Body = $body;

    $mail->send();

    echo json_encode(["success" => true]);

} catch (Exception $e) {
    echo json_encode([
        "success" => false,
        "error" => "Mailer Error: " . $mail->ErrorInfo
    ]);
}
?>

