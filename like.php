<?php
session_start();
include('db_connect.php'); // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $recipeId = $data['recipeId'];
    $status = $data['status']; // 'like' or 'dislike'
    $userId = $_SESSION['user_id'];

    // Check if the user has already liked/disliked the recipe
    $stmt = $pdo->prepare("SELECT * FROM likes WHERE user_id = ? AND recipe_id = ?");
    $stmt->execute([$userId, $recipeId]);
    $existingLike = $stmt->fetch();

    if ($existingLike) {
        if ($existingLike['status'] === $status) {
            // Remove the like/dislike if the same action is repeated
            $stmt = $pdo->prepare("DELETE FROM likes WHERE id = ?");
            $stmt->execute([$existingLike['id']]);
        } else {
            // Update the status if the user toggles between like and dislike
            $stmt = $pdo->prepare("UPDATE likes SET status = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ?");
            $stmt->execute([$status, $existingLike['id']]);
        }
    } else {
        // Insert a new like/dislike
        $stmt = $pdo->prepare("INSERT INTO likes (user_id, recipe_id, status) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $recipeId, $status]);
    }

    echo json_encode(['success' => true]);
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid request']);
}
