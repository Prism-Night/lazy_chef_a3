<section>
    <h2 class="category"><?php echo htmlspecialchars($section_title); ?></h2>
    <hr>
    <div class="recipe-grid">
        <?php foreach ($recipes as $recipe): ?>
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