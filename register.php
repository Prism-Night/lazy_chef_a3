<?php
session_start();

// Database connection
$db_server = "localhost";
$db_name = "lazt_chef_a1";
$db_user = "root";
$db_pass = "";

// Using PDO
try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validate input
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user into the database
    try {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $password_hash]);

        echo "Registration successful! <a href='auth/login.php'>Login here</a>.";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate entry
            echo "Username or email already exists.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
