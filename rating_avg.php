<!-- rating_avg.php  -->

<?php
//Fetch recipes with average ratings
$stmt = $pdo->prepare("
    SELECT r.*, AVG(rt.rating) AS avg_rating
    FROM recipes r
    LEFT JOIN ratings rt ON r.id = rt.recipe_id
    WHERE r.deleted_at IS NULL
    GROUP BY r.id
");
$stmt->execute();
$recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Fetch user-specific ratings (if logged in)
$userRatings = [];
if (isset($_SESSION['user_id'])) {
    $stmt = $pdo->prepare("SELECT recipe_id, rating FROM ratings WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $userRatings = $stmt->fetchAll(PDO::FETCH_KEY_PAIR); // Fetch as [recipe_id => rating]
}
?>

<?php foreach ($recipes as $recipe): ?>
    <?php
    // Get the average rating for the recipe (default to 0 if null)
    $avgRating = $recipe['avg_rating'] ?? 0;

    // Get the user's rating for the recipe (default to null if not rated)
    $userRating = $userRatings[$recipe['id']] ?? null;
    ?>

    <article class="recipe-card">
        <img src="img/<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" class="recipe-image">
        <h4 class="recipe-head"><a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>"><?php echo htmlspecialchars($recipe['title']); ?></a></h4>
        <p class="recipe-summary"><a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>"><?php echo htmlspecialchars($recipe['description']); ?></a></p>

        <!-- Rating Section -->
        <div class="rating-section">
            <p>Average Rating: <?php echo round($avgRating, 1); ?>/5</p>
            <?php if (isset($_SESSION['user_id'])): ?>
                <div class="rating-stars" data-recipe-id="<?php echo $recipe['id']; ?>">
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <span class="star <?php echo ($userRating === $i || ($userRating === null && $i <= $avgRating)) ? 'active' : ''; ?>"
                            data-rating="<?php echo $i; ?>">&#9733;</span>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </article>
<?php endforeach; ?>