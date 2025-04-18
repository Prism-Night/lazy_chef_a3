<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'User not logged in']);
    exit;
}

$data = json_decode(file_get_contents('php://input'), true);
$userId = $_SESSION['user_id'];
$recipeId = $data['recipe_id'];
$rating = $data['rating'];

try {
    $pdo->beginTransaction();

    // Remove any existing rating for the user and recipe
    $stmt = $pdo->prepare("DELETE FROM ratings WHERE user_id = ? AND recipe_id = ?");
    $stmt->execute([$userId, $recipeId]);

    // Insert the new rating
    $stmt = $pdo->prepare("INSERT INTO ratings (user_id, recipe_id, rating) VALUES (?, ?, ?)");
    $stmt->execute([$userId, $recipeId, $rating]);

    $pdo->commit();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    $pdo->rollBack();
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
