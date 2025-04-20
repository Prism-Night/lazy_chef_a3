<!-- add_comment.php -->

<?php
session_start(); // Start the session

// Database connection
$db_server = 'localhost';
$db_name = 'lazt_chef_a1';
$db_user = 'root';
$db_pass = "";

try {
    $pdo = new PDO("mysql:host=$db_server;dbname=$db_name", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ensure the user is logged in
        if (!isset($_SESSION['user_id'])) {
            die("You must be logged in to leave a comment.");
        }

        // Retrieve the user ID from the session
        $user_id = $_SESSION['user_id'];
        $recipe_id = $_POST['recipe_id'];
        $comment = trim($_POST['comment']);

        // Validate input
        if (empty($comment)) {
            die("Comment cannot be empty.");
        }

        // Insert the comment into the database
        $stmt = $pdo->prepare("INSERT INTO comments (user_id, recipe_id, comment) VALUES (:user_id, :recipe_id, :comment)");
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':recipe_id', $recipe_id, PDO::PARAM_INT);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->execute();

        // Redirect back to the recipe page
        header("Location: Recipe.php?id=$recipe_id");
        exit;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
