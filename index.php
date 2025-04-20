<!-- index.php  -->
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
        include('welcome.php');
        ?>
    </nav>

    <section>

        <div class="filter-sort-container">
            <form id="filter-form" method="GET">
                <!-- Filter  -->
                <label for="category-filter">Filter by Category:</label>
                <select name="category" id="category-filter" onchange="applyFilter()">
                    <option value="">All Categories</option>
                    <?php foreach ($tags as $tag): ?>
                        <option value="<?php echo htmlspecialchars($tag['name']); ?>"
                            <?php echo isset($_GET['category']) && $_GET['category'] === $tag['name'] ? 'selected' : ''; ?>>
                            <?php echo htmlspecialchars($tag['name']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <!-- Sort -->
                <label for="sort-by">Sort By:</label>
                <select name="sort" id="sort-by" onchange="applyFilter()">
                    <option value="default" <?php echo isset($_GET['sort']) && $_GET['sort'] === 'default' ? 'selected' : ''; ?>>Default</option>
                    <option value="newest" <?php echo isset($_GET['sort']) && $_GET['sort'] === 'newest' ? 'selected' : ''; ?>>Newest</option>
                    <option value="popular" <?php echo isset($_GET['sort']) && $_GET['sort'] === 'popular' ? 'selected' : ''; ?>>Most Popular</option>
                    <option value="rating" <?php echo isset($_GET['sort']) && $_GET['sort'] === 'rating' ? 'selected' : ''; ?>>Rating (High to Low)</option>
                    <option value="likes" <?php echo isset($_GET['sort']) && $_GET['sort'] === 'likes' ? 'selected' : ''; ?>>Likes (High to Low)</option>
                </select>
                <button type="submit">Apply</button>
            </form>
        </div>
    </section>



    <main id="home">
        <?php
        // Fetch all recipes from the database
        $stmt = $pdo->prepare("SELECT * FROM recipes WHERE deleted_at IS NULL");
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($recipes)): ?>
            <section>
                <h2 class="category">All Recipes</h2>
                <hr>
                <!-- Search result -->
                <div class="recipe-grid">
                    <div id="search-results"></div>
                </div>

                <div id="recipe-grid" class="recipe-grid">
                    <?php foreach ($recipes as $recipe): ?>
                        <article class="recipe-card">
                            <!-- Recipe Image -->
                            <img src="img/<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" class="recipe-image">

                            <!-- Recipe Title -->
                            <h4 class="recipe-head">
                                <a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                    <?php echo htmlspecialchars($recipe['title']); ?>
                                </a>
                            </h4>

                            <!-- Recipe Summary -->
                            <p class="recipe-summary">
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
                                    <p>Average Rating: <?php echo round($avgRating, 1); ?>/5</p>
                                <?php endif; ?>
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
        <?php include('footer.php'); ?>
    </footer>
</body>

</html>