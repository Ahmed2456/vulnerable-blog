<?php
session_start();

if (!isset($_COOKIE['session_id'])) {
    header("Location: ../login.php");
    exit();
}

// Generate CSRF token if not already set
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Generate a random token
}

// Return CSRF token as JSON response
header('Content-Type: application/json');
echo json_encode(['csrf_token' => $_SESSION['csrf_token']]);
?>
