<?php
// Database connection
include('db_connect.php');

// Set PDO error mode
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Get parameters from the query string
$category = $_GET['category'] ?? '';
$sort = $_GET['sort'] ?? 'default';
$tags = isset($_GET['tags']) && !empty($_GET['tags']) ? explode(',', $_GET['tags']) : [];

// Base query
$query = "
    SELECT r.id, r.title, r.description, r.image_url,
           AVG(rt.rating) AS avg_rating,
           COUNT(DISTINCT l.id) AS like_count
    FROM recipes r
    LEFT JOIN ratings rt ON r.id = rt.recipe_id AND rt.deleted_at IS NULL
    LEFT JOIN likes l ON r.id = l.recipe_id AND l.status = 'like' AND l.deleted_at IS NULL
    LEFT JOIN recipe_tags rtg ON r.id = rtg.recipe_id
    LEFT JOIN tags t ON rtg.tag_id = t.id
    WHERE r.deleted_at IS NULL
";

// Add tag filter if specified
if (!empty($tags)) {
    $placeholders = implode(',', array_map(fn($i) => ":tag$i", range(0, count($tags) - 1)));
    $query .= " AND t.name IN ($placeholders)";
}

// Add category filter if specified
if (!empty($category)) {
    $query .= " AND t.name = :category";
}

// Group by recipe ID
$query .= " GROUP BY r.id";

// Add sorting logic
switch ($sort) {
    case 'newest':
        $query .= " ORDER BY r.created_at DESC";
        break;
    case 'popular':
        $query .= " ORDER BY like_count DESC";
        break;
    case 'rating':
        $query .= " ORDER BY avg_rating DESC";
        break;
    case 'likes':
        $query .= " ORDER BY like_count DESC";
        break;
    default:
        $query .= " ORDER BY r.id ASC"; // Default sorting
        break;
}

// Prepare and execute the query
try {
    $stmt = $pdo->prepare($query);

    // Bind category parameter
    if (!empty($category)) {
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    }

    // Bind tag parameters dynamically
    foreach ($tags as $i => $tag) {
        $stmt->bindValue(":tag$i", $tag, PDO::PARAM_STR);
    }

    // Execute the query
    $stmt->execute();

    // Return the results as JSON
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    http_response_code(500); // Internal Server Error
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
