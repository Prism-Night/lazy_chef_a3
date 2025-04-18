<ul class="menu">
    <li><a href="index.php">Home</a></li>
    <li><a href="recipes-a-main.php">Recipes</a>
        <ul class="dropdown">
            <li><a href="recipes-most-recent.php">Most Recent</a></li>
            <li><a href="recipes-top-rated.php">Top Rated</a></li>
            <li><a href="recipes-favorite.php" class="disabled">Favorite</a></li>
            <li><a href="recipes-Cuisine.php">Cuisine</a></li>
            <li><a href="recipes-vegan.php">Vegan</a></li>
        </ul>
    </li>
    <li><a href="meals-a-main.php">Meals</a>
        <ul class="dropdown">
            <li><a href="meals-breakfast.php">Breakfast</a></li>
            <li><a href="meals-main-course.php">Main Course</a></li>
            <li><a href="meals-snacks.php">Snacks</a></li>
            <li><a href="meals-desserts.php">Desserts</a></li>
        </ul>
    </li>
    <li><a href="about-us.php">About</a></li>
    <li><a href="user-profile.php">User</a>
        <ul class="dropdown">
            <li><a href="#registerPopup">Registration</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <!-- Logged-in user options -->
                <li><a href="user-profile.php">Account</a></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <!-- Guest user options -->
                <li><a href="login.php">Login</a></li>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>
        </ul>
    </li>
</ul>