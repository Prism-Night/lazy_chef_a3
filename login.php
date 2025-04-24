<!-- login.php  -->
<?php
include('session-setup.php'); // Include session_setup.php to access its functions

// Database connection
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']); // Check if "Remember Me" is selected

    // Fetch user from the database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Start session and store user details
        set_login_session($user['id'], $user['name'], $remember_me);

        // Handle "Remember Me" functionality
        if ($remember_me) {
            // Generate a secure token
            $token = bin2hex(random_bytes(16)); // Random 32-character hexadecimal string

            // Update the user's remember_token in the database
            $stmt = $pdo->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
            $stmt->execute([$token, $user['id']]);

            // Set a cookie with the token
            setcookie('user_remember', json_encode(['user_id' => $user['id'], 'token' => $token]), time() + (60 * 60 * 24 * 30), '/', '', true, true);
        }

        // Redirect to the homepage or dashboard
        header("Location: index.php");
        exit;
    } else {
        echo "Invalid username or password.";
    }
}
?>

<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="remember_me">
            <input type="checkbox" name="remember_me" id="remember_me">
            Remember Me
        </label><br>

        <button type="submit">Login</button>
    </form>
</body>