// JavaScript.js
//Bookmark recipies
document.addEventListener('DOMContentLoaded', () => {
    const bookmarkButtons = document.querySelectorAll('.bookmark-btn');

    bookmarkButtons.forEach(button => {
        button.addEventListener('click', function () {
            const recipeId = this.getAttribute('data-recipe-id'); // Get the recipe ID
            const isBookmarked = this.classList.contains('bookmarked'); // Check current state

            // Toggle the bookmark state
            if (isBookmarked) {
                this.classList.remove('bookmarked');
                this.querySelector('.bookmark-icon').textContent = '♡';
            } else {
                this.classList.add('bookmarked');
                this.querySelector('.bookmark-icon').textContent = '❤️';
            }

            // Send an AJAX request to update the server
            fetch('bookmark.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ recipe_id: recipeId, bookmarked: !isBookmarked })
            })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        alert('Failed to update bookmark. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while updating the bookmark.');
                });
        });
    });
});



//rating
document.addEventListener('DOMContentLoaded', function () {
    // Select all star elements
    const stars = document.querySelectorAll('.rating-stars .star');

    // Add click event listeners to each star
    stars.forEach(star => {
        star.addEventListener('click', function () {
            const recipeId = this.parentElement.getAttribute('data-recipe-id'); // Get the recipe ID from the parent element
            const rating = this.getAttribute('data-rating'); // Get the clicked star's rating

            // Send the rating to the server via AJAX
            fetch('rate.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ recipe_id: recipeId, rating: rating })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update the UI to reflect the new rating
                        alert('Thank you for rating!');
                        location.reload(); // Reload the page to reflect the updated average rating
                    } else {
                        alert('Failed to submit rating. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while submitting your rating.');
                });
        });
    });
});

//updated raings
document.querySelectorAll('.rating-stars').forEach(container => {
    const recipeId = container.getAttribute('data-recipe-id');

    container.addEventListener('click', function (event) {
        const star = event.target.closest('.star');
        if (!star) return;

        const rating = star.getAttribute('data-rating');

        // Send the rating to the server via AJAX
        fetch('update_rating.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ recipe_id: recipeId, rating: rating })
        })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the UI
                    container.querySelectorAll('.star').forEach((s, i) => {
                        s.classList.toggle('active', i < rating);
                    });
                }
            })
            .catch(error => console.error('Error:', error));
    });
});



//like and dislike
document.querySelectorAll('.like-buttons .like-btn').forEach(button => {
    button.addEventListener('click', function () {
        const recipeId = this.parentElement.getAttribute('data-recipe-id');
        const status = this.getAttribute('data-status');

        fetch('like.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ recipeId, status })
        }).then(response => response.json()).then(data => {
            if (data.success) {
                alert(`You ${status}d this recipe.`);
            }
        });
    });
});

// Sort Recipes
function sortRecipes() {
    const sortOption = document.getElementById('sort').value;
    fetch(`sort.php?sort=${sortOption}`)
        .then(response => response.json())
        .then(data => {
            displayRecipes(data);
        });
}
//Filter Recipes
function applyFilter() {
    const form = document.getElementById('filter-form');
    const formData = new FormData(form);

    // Build query string
    const queryParams = new URLSearchParams(formData).toString();

    // Send an AJAX request to filter_sort.php
    fetch(`filter_sort.php?${queryParams}`)
        .then(response => response.json()) // Parse the JSON response
        .then(data => {
            const recipeGrid = document.getElementById('recipe-grid');
            recipeGrid.innerHTML = ''; // Clear the current recipe grid

            if (data.length > 0) {
                data.forEach(recipe => {
                    const article = document.createElement('article');
                    article.className = 'recipe-card';
                    article.innerHTML = `
                        <img src="img/${recipe.image_url}" alt="${recipe.title}" class="recipe-image">
                        <h4 class="recipe-head">
                            <a href="recipe.php?id=${recipe.id}">${recipe.title}</a>
                        </h4>
                        <p class="recipe-summary">
                            <a href="recipe.php?id=${recipe.id}">${recipe.description}</a>
                        </p>
                    `;
                    recipeGrid.appendChild(article);
                });
            } else {
                recipeGrid.innerHTML = '<p>No recipes available.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching recipes:', error);
        });
}



//Display Recipes after sort and filter
function displayRecipes(recipes) {
    const container = document.querySelector('.recipe-grid');
    container.innerHTML = '';
    recipes.forEach(recipe => {
        container.innerHTML += `
            <article class="recipe-card">
                <img src="${recipe.image_url}" alt="" class="recipe-image">
                <h4 class="recipe-head"><a href="recipe.php?id=${recipe.id}">${recipe.title}</a></h4>
                <p class="recipe-summary">${recipe.description}</p>
            </article>
        `;
    });
}


//Smooth Scrolling
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            window.scrollTo({
                top: targetElement.offsetTop,
                behavior: 'smooth' // Smooth scrolling
            });
        }
    });
});

//Dynamic Loading
function filterRecipes() {
    const loader = document.createElement('div');
    loader.classList.add('loader');
    document.querySelector('.recipe-grid').innerHTML = ''; // Clear current recipes
    document.querySelector('.recipe-grid').appendChild(loader); // Show loader

    fetch('filter.php?tags=' + selectedTags.join(','))
        .then(response => response.json())
        .then(data => {
            loader.remove(); // Remove loader
            displayRecipes(data); // Display filtered recipes
        })
        .catch(error => {
            loader.remove();
            console.error('Error:', error);
            alert('An error occurred while fetching recipes.');
        });
}

//Page Animation
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('active');
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('.fade-in').forEach(element => {
        observer.observe(element);
    });
});


//Search 
document.querySelector('.search-bar').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    const searchQuery = document.querySelector('input[name="search"]').value.trim();

    if (searchQuery) {
        // Clear previous results
        document.querySelector('#search-results').innerHTML = '';

        fetch(`search.php?search=${encodeURIComponent(searchQuery)}`)
            .then(response => response.text())
            .then(data => {
                // Insert the search results into the #search-results container
                document.querySelector('#search-results').innerHTML = data;

                // Hide the original recipe grid if necessary
                document.querySelector('.recipe-grid').style.display = 'grid';
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
                document.querySelector('#search-results').innerHTML = '<p>An error occurred while searching. Please try again later.</p>';
            });
    } else {
        alert('Please enter a search term.');
    }
});

//recipie grid
document.querySelector('.search-bar').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent form submission

    const searchQuery = document.querySelector('input[name="search"]').value.trim();

    if (searchQuery) {
        // Clear previous results
        document.querySelector('#search-results').innerHTML = '';

        // Fetch search results via AJAX
        fetch(`search.php?search=${encodeURIComponent(searchQuery)}`)
            .then(response => response.text())
            .then(data => {
                // Insert the search results into the #search-results container
                document.querySelector('#search-results').innerHTML = data;

                // Ensure the recipe grid is visible
                document.querySelector('.recipe-grid').style.display = 'grid';
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
                document.querySelector('#search-results').innerHTML = '<p>An error occurred while searching. Please try again later.</p>';
            });
    } else {
        alert('Please enter a search term.');
    }
});


