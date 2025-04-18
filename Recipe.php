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

    <?php
    // Check if an ID is provided in the URL (for viewing a specific recipe)
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $recipe_id = $_GET['id'];

        // Fetch recipe details
        $stmt = $pdo->prepare("SELECT * FROM recipes WHERE id = :id AND deleted_at IS NULL");
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();
        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$recipe) {
            echo "<p>Recipe not found!</p>";
            exit;
        }

        // Fetch ingredients
        $stmt = $pdo->prepare("SELECT name, quantity FROM ingredients WHERE recipe_id = :id ORDER BY id ASC");
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();
        $ingredients = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fetch steps
        $stmt = $pdo->prepare("SELECT step_order, description FROM steps WHERE recipe_id = :id ORDER BY step_order ASC");
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();
        $steps = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fetch comments
        $stmt = $pdo->prepare("
        SELECT c.comment, u.name AS username, c.created_at 
        FROM comments c
        JOIN users u ON c.user_id = u.id
        WHERE c.recipe_id = :id AND c.deleted_at IS NULL
        ORDER BY c.created_at DESC
    ");
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();
        $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Fetch average rating for the recipe
        $stmt = $pdo->prepare("SELECT AVG(rating) AS avg_rating FROM ratings WHERE recipe_id = :id AND deleted_at IS NULL");
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();
        $avgRating = $stmt->fetchColumn();

        // Fetch user's rating (if logged in)
        $userRating = null;
        if (isset($_SESSION['user_id'])) {
            $stmt = $pdo->prepare("SELECT rating FROM ratings WHERE user_id = ? AND recipe_id = ?");
            $stmt->execute([$_SESSION['user_id'], $recipe_id]);
            $userRating = $stmt->fetchColumn();
        }

        // Fetch like/dislike counts
        $stmt = $pdo->prepare("
        SELECT 
            SUM(CASE WHEN status = 'like' THEN 1 ELSE 0 END) AS like_count,
            SUM(CASE WHEN status = 'dislike' THEN 1 ELSE 0 END) AS dislike_count
        FROM likes 
        WHERE recipe_id = :id AND deleted_at IS NULL
    ");
        $stmt->bindParam(':id', $recipe_id, PDO::PARAM_INT);
        $stmt->execute();
        $likeCounts = $stmt->fetch(PDO::FETCH_ASSOC);

        // Fetch user's like/dislike status (if logged in)
        $userLikeStatus = null;
        if (isset($_SESSION['user_id'])) {
            $stmt = $pdo->prepare("SELECT status FROM likes WHERE user_id = ? AND recipe_id = ?");
            $stmt->execute([$_SESSION['user_id'], $recipe_id]);
            $userLikeStatus = $stmt->fetchColumn();
        }

        // Fetch the user's bookmarked recipes if logged in
        $bookmarkedRecipes = [];
        if (isset($_SESSION['user_id'])) {
            $stmt = $pdo->prepare("SELECT recipe_id FROM bookmarks WHERE user_id = ? AND deleted_at IS NULL");
            $stmt->execute([$_SESSION['user_id']]);
            $bookmarkedRecipes = $stmt->fetchAll(PDO::FETCH_COLUMN);
        }


    ?>

        <main id="home">
            <div class="container">


                <!-- Recipe Header -->
                <article class="recipe-header">
                    <h2 class="recipe-title"><?php echo htmlspecialchars($recipe['title']); ?></h2>
                    <p class="recipe-subtitle"><?php echo htmlspecialchars($recipe['description']); ?></p>

                </article>


                <!-- Recipe Image -->
                <div class="recipe-image">
                    <img src="img/<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>">
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

                </div>


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

                <!-- Like/Dislike Section -->
                <?php if (isset($_SESSION['user_id'])): ?>
                    <div class="like-buttons" data-recipe-id="<?php echo $recipe['id']; ?>">
                        <button class="like-btn <?php echo $userLikeStatus === 'like' ? 'active' : ''; ?>"
                            data-status="like">👍 Like (<?php echo $likeCounts['like_count']; ?>)</button>
                        <button class="dislike-btn <?php echo $userLikeStatus === 'dislike' ? 'active' : ''; ?>"
                            data-status="dislike">👎 Dislike (<?php echo $likeCounts['dislike_count']; ?>)</button>
                    </div>
                <?php endif; ?>


                <!-- Recipe Details -->
                <article class="recipe-details">
                    <h2>Ingredients:</h2>
                    <ul>
                        <?php foreach ($ingredients as $ingredient): ?>
                            <li><?php echo htmlspecialchars($ingredient['name']) . ' - ' . htmlspecialchars($ingredient['quantity']); ?></li>
                        <?php endforeach; ?>
                    </ul>

                    <h2>Instructions:</h2>
                    <?php if (!empty($steps)): ?>
                        <ol>
                            <?php foreach ($steps as $step): ?>
                                <li><?php echo htmlspecialchars($step['description']); ?></li>
                            <?php endforeach; ?>
                        </ol>
                    <?php else: ?>
                        <p>No instructions available for this recipe.</p>
                    <?php endif; ?>
                </article>

                <!-- Comments Section -->
                <section class="comments-section">
                    <h2>Comments:</h2>
                    <?php if (!empty($comments)): ?>
                        <?php foreach ($comments as $comment): ?>
                            <div class="comment">
                                <p><strong><?php echo htmlspecialchars($comment['username']); ?>:</strong> <?php echo htmlspecialchars($comment['comment']); ?></p>
                                <small><?php echo htmlspecialchars($comment['created_at']); ?></small>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No comments yet. Be the first to comment!</p>
                    <?php endif; ?>

                    <!-- Comment Form -->
                    <div class="comment-form">
                        <h3>Add a Comment:</h3>
                        <form method="POST" action="add_comment.php">
                            <input type="hidden" name="recipe_id" value="<?php echo $recipe_id; ?>">
                            <textarea name="comment" placeholder="Share your thoughts..." rows="4" required></textarea>
                            <button type="submit">Post Comment</button>
                        </form>
                    </div>
                </section>
            </div>
        </main>
    <?php
    } else {
        // If no ID is provided, display the homepage with all recipes
        $stmt = $pdo->prepare("SELECT * FROM recipes WHERE deleted_at IS NULL");
        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    ?>

    <footer>
        <p>&copy; 2025 Lazy Chef </p>
    </footer>