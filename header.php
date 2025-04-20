<!-- header.php  -->
<header class="main-head">
    <nav class="HBmenu">
        <label for="toggle" aria-label="Toggle Menu" aria-expanded="false" aria-controls="menu-header">&#9776;</label>
        <input type="checkbox" id="toggle">
        <ul class="menu-header" id="menu-header">
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
    </nav>

    <div class="branding">
        <a href="index.php">
            <img src="img/logo.png" alt="Lazy Chef Logo" class="logo-image">
        </a>
        <h1><a href="index.php" class="lazyhead">Lazy Chef</a></h1>
    </div>

    <div class="search-container">
        <form action="search.php" method="get" class="search-bar">
            <label for="searchQuery" class="visually-hidden">Search</label>
            <input type="text" name="search" placeholder="Search . . . " required value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
            <button type="submit" class="search-button">Search</button>
        </form>
    </div>

    <div class="login-container">
        <?php if (isset($_SESSION['user_id'])): ?>
            <!-- User is logged in -->
            <a href="logout.php" class="login-link">
                <img src="img/logout-icon.png" alt="Logout" class="logout-icon">
                <span>Logout</span>
            </a>
        <?php else: ?>
            <!-- User is not logged in -->
            <a href="#loginPopup" class="login-link">
                <img src="img/login-icon.png" alt="Login" class="login-icon">
                <span>Login</span>
            </a>
        <?php endif; ?>
    </div>

    <!-- Login Popup -->
    <section id="loginPopup" class="popup">
        <div class="popup-content">
            <a href="#" class="close" aria-label="Close_Popup">&times;</a>
            <form class="form" action="login.php" method="POST">
                <h2>Login</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="popup-button">Login</button>
            </form>
        </div>
    </section>

    <!-- Register Popup -->
    <section id="registerPopup" class="popup">
        <div class="popup-content">
            <a href="#" class="close" aria-label="Close_Popup">&times;</a>
            <form class="form" action="register.php" method="POST">
                <h2>Register</h2>
                <input type="text" name="username" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" class="popup-button">Register</button>
                <p>Already have an account? <a href="#loginPopup">Login here</a>.</p>
            </form>
        </div>
    </section>
</header>