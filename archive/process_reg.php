<?php
session_start();

// Collect & validate
$enrollment = trim($_POST['EnNo'] ?? '');
$dob = trim($_POST['DOB'] ?? '');
$phone = trim($_POST['Cell_Phone'] ?? '');
$email = trim($_POST['Email_id'] ?? '');

$errors = [];

if (!preg_match('/^\d{4}$/', $enrollment)) {
    $errors[] = "Enrollment number must be 4 digits.";
}
if (empty($dob)) {
    $errors[] = "Date of Birth is required.";
}
if (!preg_match('/^01\d{9}$/', $phone)) {
    $errors[] = "Invalid phone number format.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (!empty($errors)) {
    $_SESSION['message'] = implode('<br>', $errors);
    header("Location: archive_reg.html");
    exit;
}

// Save
$record = "$enrollment, $dob, $phone, $email\n";
file_put_contents("registrations.txt", $record, FILE_APPEND);

// Success
$_SESSION['message'] = "Registration successful! OTP sent (simulated).";
header("Location: archive_reg.html");
exit;
