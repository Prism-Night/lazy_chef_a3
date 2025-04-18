<?php
session_start(); // Start the session to access user_id
include('db_connect.php'); // Include your database connection file

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to rate a recipe.']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$recipe_id = $data['recipe_id'] ?? null;
$rating = $data['rating'] ?? null;

// Validate input
if (!$recipe_id || !$rating || !is_numeric($rating) || $rating < 1 || $rating > 5) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

// Check if the user has already rated this recipe
$stmt = $pdo->prepare("SELECT id FROM ratings WHERE user_id = ? AND recipe_id = ? AND deleted_at IS NULL");
$stmt->execute([$_SESSION['user_id'], $recipe_id]);
$existingRating = $stmt->fetch();

if ($existingRating) {
    // Prevent duplicate ratings
    echo json_encode(['success' => false, 'message' => 'You have already rated this recipe.']);
    exit;
}

// Insert a new rating
$stmt = $pdo->prepare("INSERT INTO ratings (user_id, recipe_id, rating, created_at, updated_at) VALUES (?, ?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
$success = $stmt->execute([$_SESSION['user_id'], $recipe_id, $rating]);

if ($success) {
    // Return success response
    echo json_encode(['success' => true, 'message' => 'Rating submitted successfully.']);
} else {
    // Return failure response
    echo json_encode(['success' => false, 'message' => 'Failed to submit rating. Please try again.']);
}
