<!-- bookmark.php -->

<?php
session_start(); // Start the session to access user_id
include('db.php'); // Include your database connection file

// Ensure the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'You must be logged in to bookmark a recipe.']);
    exit;
}

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);
$recipe_id = $data['recipe_id'] ?? null;
$bookmarked = $data['bookmarked'] ?? null;

// Validate input
if (!$recipe_id || $bookmarked === null || !is_numeric($recipe_id)) {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
    exit;
}

$user_id = $_SESSION['user_id'];

// Check if the user has already bookmarked this recipe
$stmt = $pdo->prepare("SELECT id FROM bookmarks WHERE user_id = ? AND recipe_id = ? AND deleted_at IS NULL");
$stmt->execute([$user_id, $recipe_id]);
$existingBookmark = $stmt->fetch();

if ($bookmarked) {
    // Add a new bookmark
    if (!$existingBookmark) {
        $stmt = $pdo->prepare("INSERT INTO bookmarks (user_id, recipe_id, created_at, updated_at) VALUES (?, ?, CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
        $stmt->execute([$user_id, $recipe_id]);
    }
} else {
    // Remove the existing bookmark
    if ($existingBookmark) {
        $stmt = $pdo->prepare("UPDATE bookmarks SET deleted_at = CURRENT_TIMESTAMP WHERE id = ?");
        $stmt->execute([$existingBookmark['id']]);
    }
}

echo json_encode(['success' => true]);
