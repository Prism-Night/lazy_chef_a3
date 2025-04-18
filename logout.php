<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start the session
session_start();

// Include session-setup.php
include('session-setup.php');

// Debugging: Check session before logout
echo "Before logout: User ID = " . ($_SESSION['user_id'] ?? 'Not set') . "<br>";

// Call the logout function
logout_user();

// Debugging: Check session after logout
echo "After logout: User ID = " . ($_SESSION['user_id'] ?? 'Not set') . "<br>";

// Redirect to the login page
header("Location: index.php");
exit;
