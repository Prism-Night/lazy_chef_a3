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

    $user_id = $_SESSION['user_id'];

    // Fetch user details
    $user_stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $user_stmt->execute([$user_id]);
    $user = $user_stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch saved recipes
    $saved_stmt = $pdo->prepare("
SELECT r.id, r.title, r.image_url
FROM saved_recipes sr
JOIN recipes r ON sr.recipe_id = r.id
WHERE sr.user_id = ?
");
    $saved_stmt->execute([$user_id]);
    $saved_recipes = $saved_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch favorite recipes
    $favorites_stmt = $pdo->prepare("
SELECT r.id, r.title, r.image_url
FROM favorites f
JOIN recipes r ON f.recipe_id = r.id
WHERE f.user_id = ?
");
    $favorites_stmt->execute([$user_id]);
    $favorites = $favorites_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch liked recipes
    $likes_stmt = $pdo->prepare("
SELECT r.id, r.title, r.image_url
FROM likes l
JOIN recipes r ON l.recipe_id = r.id
WHERE l.user_id = ?
");
    $likes_stmt->execute([$user_id]);
    $liked_recipes = $likes_stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch user comments
    $comments_stmt = $pdo->prepare("
SELECT c.comment, r.title AS recipe_title, c.created_at
FROM comments c
JOIN recipes r ON c.recipe_id = r.id
WHERE c.user_id = ?
");
    $comments_stmt->execute([$user_id]);
    $comments = $comments_stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>


    <body>
        <!-- Main class -->
        <main>
            <h2 class="category">Welcome, <?php echo htmlspecialchars($user['name']); ?></h2>
            <hr>
            <!-- Saved Recipes Section -->
            <section>
                <h2 class="category">Saved Recipes</h2>
                <hr>
                <div class="recipe-grid">
                    <?php foreach ($saved_recipes as $recipe): ?>
                        <article class="recipe-card">
                            <img src="<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" class="recipe-image">
                            <h4 class="recipe-head">
                                <a href="Recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                    <?php echo htmlspecialchars($recipe['title']); ?>
                                </a>
                            </h4>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Favorite Recipes Section -->
            <section>
                <h2 class="category">Favorite Recipes</h2>
                <hr>
                <div class="recipe-grid">
                    <?php foreach ($favorites as $recipe): ?>
                        <article class="recipe-card">
                            <img src="<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" class="recipe-image">
                            <h4 class="recipe-head">
                                <a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                    <?php echo htmlspecialchars($recipe['title']); ?>
                                </a>
                            </h4>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Liked Recipes Section -->
            <section>
                <h2 class="category">Liked Recipes</h2>
                <hr>
                <div class="recipe-grid">
                    <?php foreach ($liked_recipes as $recipe): ?>
                        <article class="recipe-card">
                            <img src="<?php echo htmlspecialchars($recipe['image_url']); ?>" alt="<?php echo htmlspecialchars($recipe['title']); ?>" class="recipe-image">
                            <h4 class="recipe-head">
                                <a href="recipe.php?id=<?php echo htmlspecialchars($recipe['id']); ?>">
                                    <?php echo htmlspecialchars($recipe['title']); ?>
                                </a>
                            </h4>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- User Comments Section -->
            <section>
                <h2 class="category">Your Comments</h2>
                <hr>
                <ul>
                    <?php foreach ($comments as $comment): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($comment['recipe_title']); ?>:</strong>
                            <p><?php echo htmlspecialchars($comment['comment']); ?></p>
                            <small>
                                <?php
                                // Ensure created_at exists and format it properly
                                if (isset($comment['created_at']) && !empty($comment['created_at'])) {
                                    echo htmlspecialchars(date('F j, Y, g:i a', strtotime($comment['created_at'])));
                                } else {
                                    echo 'Date not available';
                                }
                                ?>
                            </small>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </main>

        <footer>
            <?php
            include('footer.php');
            ?>
        </footer>
    </body>

</html>