<!-- session-setup.php  -->

<?php
// Start the session
session_start();

// Define constants for cookie names
define('COOKIE_NAME', 'user_remember');
define('COOKIE_EXPIRY', 60 * 60 * 24 * 30); // 30 days in seconds

// Initialize PDO connection
include('db_connect.php');

// Function to set a session and optionally a cookie
function set_login_session($user_id, $username, $remember_me = false)
{
    // Validate input
    $user_id = filter_var($user_id, FILTER_VALIDATE_INT); //validation for user_id
    $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); // Sanitization for username

    // Set session variables
    $_SESSION['user_id'] = $user_id;
    $_SESSION['username'] = $username;

    // If "Remember Me" is checked, set a cookie
    if ($remember_me) {
        try {
            // Generate a secure token
            $token = bin2hex(random_bytes(16));

            // Store the token in the database
            global $pdo;
            $stmt = $pdo->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
            $stmt->execute([$token, $user_id]);

            // Set a cookie with the token
            setcookie(COOKIE_NAME, json_encode(['user_id' => $user_id, 'token' => $token]), time() + COOKIE_EXPIRY, '/', '', true, true);
        } catch (Exception $e) {
            error_log("Error setting login session: " . $e->getMessage()); // Added error logging
        }
    }
}

// Function to check if the user is logged in
function is_user_logged_in()
{
    // Check if the session exists
    if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
        return true;
    }

    // Check if a "Remember Me" cookie exists
    if (isset($_COOKIE[COOKIE_NAME])) {
        $cookie_data = json_decode($_COOKIE[COOKIE_NAME], true);
        if (isset($cookie_data['user_id']) && isset($cookie_data['token'])) {
            $user_id = filter_var($cookie_data['user_id'], FILTER_VALIDATE_INT); // Added validation for user_id
            $token = $cookie_data['token'];

            // Validate the token with the database
            global $pdo;
            try {
                $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ? AND remember_token = ?");
                $stmt->execute([$user_id, $token]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($user) {
                    // Restore the session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username']; // Ensure this matches your database column
                    return true;
                }
            } catch (Exception $e) {
                error_log("Error validating token: " . $e->getMessage()); // Added error logging
            }
        }
    }

    return false;
}

// Function to log out the user
function logout_user()
{
    // Store the user ID temporarily
    $user_id = $_SESSION['user_id'] ?? null; // Added temporary storage for user_id

    // Unset all session variables
    session_unset();
    session_destroy();

    // Delete the "Remember Me" cookie
    if (isset($_COOKIE[COOKIE_NAME])) {
        setcookie(COOKIE_NAME, '', time() - 3600, '/', '', true, true);
    }

    // Clear the remember_token in the database
    if ($user_id) { // Use the stored user_id instead of accessing $_SESSION after destruction
        try {
            global $pdo;
            $stmt = $pdo->prepare("UPDATE users SET remember_token = NULL WHERE id = ?");
            $stmt->execute([$user_id]);
        } catch (Exception $e) {
            error_log("Error clearing remember token: " . $e->getMessage()); // Added error logging
        }
    }
}
