<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if terms accepted
    if (!isset($_POST['agree_terms'])) {
        die("You must agree to the terms and privacy policy.");
    }

    $to = "sajedurtareq@gmail.com";  // ✅ CHANGE THIS TO YOUR EMAIL
    $subject = "New Feedback Submission";
    $body = "";

    if (isset($_POST['anonymous_check']) && !empty($_POST['anonymous_feedback'])) {
        $body .= "Submission Type: Anonymous\n";
        $body .= "Feedback: " . htmlspecialchars($_POST['anonymous_feedback']) . "\n";
    } elseif (isset($_POST['recognized_check']) && !empty($_POST['recognized_feedback'])) {
        $body .= "Submission Type: Recognized\n";
        $body .= "Feedback: " . htmlspecialchars($_POST['recognized_feedback']) . "\n";
        $body .= "Name: " . htmlspecialchars($_POST['name']) . "\n";
        $body .= "Email: " . htmlspecialchars($_POST['email']) . "\n";
        $body .= "Mobile: " . htmlspecialchars($_POST['mobile']) . "\n";
    } else {
        die("Invalid submission.");
    }

    // Send Email
    $headers = "From: no-reply@yourdomain.com\r\n";

    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you! Your feedback has been sent.";
    } else {
        echo "Failed to send feedback.";
    }
}
