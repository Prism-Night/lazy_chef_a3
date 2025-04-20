Project Title
Lazy Chef

Description
Lazy Chef is an intelligent recipe and meal-planning platform designed to simplify cooking experiences for busy individuals, health-conscious users, and families. It enables users to discover recipes based on available ingredients, create personalized meal plans, and follow step-by-step cooking guidance—all without the hassle of manual planning or complex processes. 

This project was developed by three computer science students (Darren, Boris, and Hope) as part of their Academic Project work, showcasing collaboration and innovation.

Table of Contents
1. Installation
2. Usage
3. Features
4. File Structure
5. Contributing


1. Installation
To set up Lazy Chef locally, follow these steps:

    1.1. Clone the Repository :
    -Open your terminal or command prompt.
    -Run the following command to clone the project:
    https://github.com/yourusername/lazy-chef.git

    1.2. Install Dependencies :
    Navigate to the project directory:
    cd lazy-chef

    1.3. Install any required libraries or dependencies (if applicable). For this project, ensure you have:
    -A modern web browser (e.g., Chrome, Firefox).
    -Basic HTML, CSS, and JavaScript support.

    1.4. Run the Project :
    -Open the index.html file in your preferred web browser.
    -Explore the different pages (recipe-catalog.html, meal-plans.html, etc.) to interact with the platform.

    1.5. Optional: Set Up a Local Server :
    -If you want to simulate a production environment, use a local server like Python's HTTP server:
    -python -m http.server
    -Visit http://localhost:8000 in your browser to view the project.

2. Usage
Using Lazy Chef is simple and intuitive:

    Usage
Using Lazy Chef is simple and intuitive:

        2.1. Home Page
             Start at the homepage (index.php) to get an overview of the platform.

        2.2. Recipe Catalog
             Navigate to the Recipe Catalog (recipes-most-recent.php, recipes-top-rated.php, etc.) to browse recipes:

             Use filters like "Most Recent," "Top Rated," and "Favorites" to refine your search.
             Select a recipe preference (e.g., Breakfast, Main Course, Desserts) to find specific types of meals.
        2.3. Meal Plans
             Visit the Meal Plans page (meal-plans.php) to explore pre-designed meal plans:

        2.4. User Profile
             Access the User Profile (user-profile.php) to:

             View saved recipes, favorite recipes, liked recipes, and comments.
             Manage personal details and dietary preferences.
        2.5. About Us
             Learn more about the team behind Lazy Chef by visiting the About Us page (about-us.php).

3. Features
Lazy Chef offers the following key features:

    -Recipe Discovery : Easily find recipes based on dietary preferences, cuisine type, or meal category.
    -Step-by-Step Guidance : Follow detailed instructions with accompanying images for seamless preparation.
    -Filters & Sorting : Use filters like "Most Recent," "Favorites," and "Cuisine" to streamline recipe selection.
    -Adaptability : Designed with scalability in mind, allowing for future enhancements and integrations.
    -Minimalist Design : A clean and user-friendly interface ensures ease of use for all skill levels.
    -Interactive Features :
        Like/Dislike recipes (like.php).
        Rate recipes (rating.php).
        Bookmark recipes for later (bookmark.php).
        Add comments to recipes (add_comment.php).
    -User Authentication :
        Register new accounts (register.php).
        Log in securely (login.php).
        Session management (session-check.php).

4. File Structure

├── css/               # Stylesheets
├── db_connect.php     # Database connection script
├── head.php           # Common <head> section
├── header.php         # Header template
├── footer.php         # Footer template
├── index.php          # Homepage
├── recipes/           # Recipe-related pages
│   ├── recipes-most-recent.php
│   ├── recipes-top-rated.php
│   └── recipes-favorite.php
├── meals/             # Meal-related pages
│   ├── meals-breakfast.php
│   └── meals-main-course.php
├── session-check.php  # Session management
├── schema.sql         # Database schema
├── add_comment.php    # Add comments functionality
├── bookmark.php       # Bookmark recipes functionality
├── like.php           # Like/dislike recipes functionality
├── rating.php         # Rating recipes functionality
└── user-profile.php   # User profile page


5. Contributing
We welcome contributions from the community to enhance Lazy Chef! Here’s how you can contribute:

    4.1. Fork the Repository :
    Click the "Fork" button on the GitHub repository to create your own copy.

    4.2. Create a Branch :
    Make changes in a new branch:
    git checkout -b feature/new-feature

    4.3. Commit Your Changes :
    Add and commit your changes:
    git add .
    git commit -m "Add new feature"

    4.4. Push to Your Fork :
    Push your branch to your forked repository:
    git push origin feature/new-feature

    4.5. Submit a Pull Request :
    Open a pull request on the main repository, describing your changes and their benefits.

Note : Ensure your contributions align with the project's goals and maintain consistency in code style and functionality.

License
Lazy Chef is released under the MIT License . This means you are free to use, modify, and distribute the project as long as you include the original license and copyright notice.

