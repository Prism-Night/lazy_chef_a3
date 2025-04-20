<!-- fetch_recipes.php -->

<?php
include 'db_connect.php';

// Fetch recipes from the database
function fetchRecipesFromDatabase($category = null)
{
    global $conn;

    $sql = "SELECT * FROM recipes WHERE deleted_at IS NULL";
    if ($category) {
        $sql .= " AND category = :category";
    }
    $stmt = $conn->prepare($sql);

    if ($category) {
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Display recipes in a grid
function displayRecipes($category, $recipes)
{
    echo '<section>';
    echo '<h2 class="category">' . htmlspecialchars($category) . '</h2>';
    echo '<hr>';
    echo '<div class="recipe-grid">';

    foreach ($recipes as $recipe) {
        echo '<article class="recipe-card">';
        echo '<img src="' . htmlspecialchars($recipe['image_url']) . '" alt="' . htmlspecialchars($recipe['title']) . '" class="recipe-image">';
        echo '<h4 class="recipe-head"><a href="recipe.php?id=' . $recipe['id'] . '">' . htmlspecialchars($recipe['title']) . '</a></h4>';
        echo '<p class="recipe-summary">' . htmlspecialchars($recipe['description']) . '</p>';
        echo '</article>';
    }

    echo '</div>';
    echo '</section>';
}

// Example usage
$allRecipes = fetchRecipesFromDatabase(); // Fetch all recipes
displayRecipes("All Recipes", $allRecipes);

$pastaRecipes = fetchRecipesFromDatabase("Pasta"); // Fetch Pasta category recipes
displayRecipes("Pasta Recipes", $pastaRecipes);
