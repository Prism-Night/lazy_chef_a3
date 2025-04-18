<?php
include('db_connect.php'); // Include the database connection

// Get the search query from the request
$searchQuery = $_GET['search'] ?? '';

if (!empty($searchQuery)) {
    $searchQuery = trim($searchQuery);
    $searchQuery = htmlspecialchars($searchQuery);

    // Prepare the SQL query to search for recipes
    $sql = "
        SELECT id, title, image_url 
        FROM recipes 
        WHERE title LIKE :query OR description LIKE :query
        ORDER BY created_at DESC
    ";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':query', '%' . $searchQuery . '%', PDO::PARAM_STR);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($results) {
            foreach ($results as $recipe) {
                echo '<article class="recipe-card">';
                echo '<img src="' . htmlspecialchars($recipe['image_url']) . '" alt="' . htmlspecialchars($recipe['title']) . '" class="recipe-image">';
                echo '<h4 class="recipe-head"><a href="recipe.php?id=' . htmlspecialchars($recipe['id']) . '">' . htmlspecialchars($recipe['title']) . '</a></h4>';
                echo '</article>';
            }
        } else {
            echo '<p>No results found for "' . htmlspecialchars($searchQuery) . '".</p>';
        }
    } catch (PDOException $e) {
        echo '<p>An error occurred while searching. Please try again later.</p>';
    }
} else {
    echo '<p>Please enter a search term.</p>';
}
