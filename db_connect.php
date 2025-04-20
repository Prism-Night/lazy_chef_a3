<!-- db_connect -->
<?php

$db_server = "localhost";
$db_name = "lazt_chef_a1";
$db_user = "root";
$db_pass = "";



//using PDO
try {
    // Create PDO connection
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log errors and display a user-friendly message
    error_log("Database connection failed: " . $e->getMessage());
    die("Could not connect to the database. Please try again later.");
}
