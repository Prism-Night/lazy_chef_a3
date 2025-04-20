<!-- recipes-vegan.php  -->

<!DOCTYPE html>
<html lang="en">


<?php

// Enable error reporting (for development only)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary files
include('db_connect.php');
include('session-check.php');

?>

<head>
    <?php include('head.php'); ?>
</head>

<body>
    <header>
        <?php include('header.php'); ?>
    </header>

    <nav>
        <?php
        include('menu.php');
        ?>
    </nav>

    <main id="home">
        <nav class="side-menu-container">
            <h2 class="head-side-menu">Recipies</h2>
            <ul class="side-menu">
                <li><a href="recipes-most-recent.php">Most Recent</a></li>
                <li><a href="recipes-top-rated.php">Top Rated</a></li>
                <li><a href="recipes-favorite.php" class="disabled">Favorite</a></li>
                <li><a href="recipes-Cuisine.php">Cuisine</a></li>
                <li><a href="recipes-vegan.php">Vegan</a></li>
            </ul>
        </nav>

        <?php
        // Fetch all recipes from the database
        $stmt = $pdo->prepare("SELECT * FROM recipes WHERE deleted_at IS NULL");
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($recipes)): ?>
            <section>
                <h2 class="category-sidemenu">Vegan</h2>
                <hr class="hr-sidemenu">
                <div class="recipe-grid-sidemenu">
                    <?php foreach ($recipes as $recipe): ?>
                        <article class="recipe-card-sidemenu">
                            <img src="img/<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" class="recipe-image">
                            <h4 class="recipe-head-sidemenu">
                                <a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                    <?php echo htmlspecialchars($recipe['title']); ?>
                                </a>
                            </h4>
                            <p class="recipe-summary-sidemenu">
                                <a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                    <?php echo htmlspecialchars($recipe['description']); ?>
                                </a>
                            </p>


                            <!-- Rating Section -->
                            <?php
                            $avgRating = $recipe['avg_rating'] ?? 0; // Get the average rating for the recipe (default to 0 if null)
                            $userRating = $userRatings[$recipe['id']] ?? null; // Get the user's rating for the recipe (default to null if not rated)
                            ?>
                            <div class="rating-section">
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <div class="rating-stars" data-recipe-id="<?php echo $recipe['id']; ?>">
                                        <?php for ($i = 1; $i <= 5; $i++): ?>
                                            <span class="star <?php echo ($userRating === $i || ($userRating === null && $i <= $avgRating)) ? 'active' : ''; ?>"
                                                data-rating="<?php echo $i; ?>">&#9733;</span>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                                <p>Average Rating: <?php echo round($avgRating, 1); ?>/5</p>
                            </div>

                            <!-- Bookmark Button -->
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <button class="bookmark-btn" data-recipe-id="<?php echo $recipe['id']; ?>">
                                    <span class="bookmark-icon">
                                        <?php
                                        $stmt = $pdo->prepare("SELECT * FROM bookmarks WHERE user_id = ? AND recipe_id = ?");
                                        $stmt->execute([$_SESSION['user_id'], $recipe['id']]);
                                        $isBookmarked = $stmt->fetch();
                                        echo $isBookmarked ? '❤️' : '♡';
                                        ?>
                                    </span>
                                </button>
                            <?php endif; ?>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        <?php else: ?>
            <p>No recipes available.</p>
        <?php endif; ?>
    </main>

    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>
</body>

</html>