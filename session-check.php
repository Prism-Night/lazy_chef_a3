<!-- session-check.php  -->

<?php
session_start();

// Check if the user is logged in
function is_user_logged_in()
{
    return isset($_SESSION['user_id']) && isset($_SESSION['username']);
}

// Restrict access only for specific pages (e.g., account settings, dashboard)
$restricted_pages = ['user-profile.php']; // Add restricted pages here

$current_page = basename($_SERVER['PHP_SELF']);

if (in_array($current_page, $restricted_pages) && !is_user_logged_in()) {
    header("Location: login.php"); // Redirect to login only for restricted pages
    exit;
}
