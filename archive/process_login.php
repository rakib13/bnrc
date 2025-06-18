<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["EnNo"] ?? '';
    $password = $_POST["SetPassword"] ?? '';

    // Example: validate credentials
    if ($username === "1234" && $password === "pass") {
        // Redirect or show dashboard
        header("Location: archive_home.html");
        exit;
    } else {
        echo "Invalid credentials.";
    }
}
