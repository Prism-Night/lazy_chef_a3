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
        <h1 class="aboutus-main">About</h1>
        <div class="aboutus-main">
            <article>
                <h2 class="aboutus-header">Introduction</h2>
                <p>At Lazy Chef, we believe in the magic of collaboration and what better way to showcase it than with a
                    team of three?<br>
                    Just like the legendary Three Musketeers, the trio of Harry Potter or even the classic primary
                    colors
                    RGB,
                    great things often come in threes. Darren, Boris, and Hope—three computer science students
                    passionate
                    about
                    technology and problem solving have joined forces to bring this project to life.</p>

                <p>Our journey began with a simple yet powerful idea: To make cooking smarter, not harder!
                    As computer science students, we wanted to design something practical, user-friendly, and adaptable
                    for
                    future enhancements. And so, Lazy Chef was born, a project that reflects our shared vision and
                    collective
                    effort.</p>
            </article>

            <article>
                <h2 class="aboutus-header">Who We Are</h2>
                <div class="aboutus-container">
                    <section class="aboutus-name">
                        <img src="img/h4.png" alt="HOPE" class="imghbd">
                        <h4>Hope</h4>
                        <p>The front-end wizard who ensures every pixel tells a story.</p>
                    </section>
                    <section class="aboutus-name">
                        <img src="img/b4.png" alt="BORRIS" class="imghbd">
                        <h4>Boris</h4>
                        <p>The back-end architect who builds robust systems to power our platform.</p>
                    </section>
                    <section class="aboutus-name">
                        <img src="img/d4.png" alt="DARREN" class="imghbd">
                        <h4>Darren</h4>
                        <p>The project coordinator who bridges design and functionality, keeping everything on track.
                        </p>
                    </section>
                </div>

                <p>Together, we’ve combined our skills in coding, design, and project management to create a platform
                    that
                    not only solves a real-world problem but also showcases the potential of teamwork.</p>
            </article>

            <article>
                <h2 class="aboutus-header">Our Project: Lazy Chef</h2>

                <p>Lazy Chef is designed to simplify meal planning and cooking for busy individuals by providing
                    intuitive
                    tools
                    for recipe selection and step-by-step cooking guidance. Our platform caters to home cooks, busy
                    professionals, students, and health-conscious individuals who seek quick, easy, and nutritious meals
                    without
                    the hassle of manual meal planning.</p>
            </article>

            <article>
                <h2 class="aboutus-header">Why Lazy Chef? </h2>

                <p>Cooking shouldn’t be a chore—it should be an enjoyable experience. With Lazy Chef, we aim to
                    eliminate
                    the
                    stress of deciding what to cook, reduce food waste, and promote healthier eating habits. Whether
                    you’re
                    a
                    beginner cook or a seasoned chef, our platform offers something for everyone.</p>

                <p>This project has been more than just an academic exercise, it has been a chance for us to engage
                    deeply
                    with
                    web development, discover our potential, and bring an idea to life. </p>
                <p>We hope Lazy Chef inspires you to explore new recipes, streamline your cooking routine, and enjoy the
                    process.</p>


                <h2>Thank you for joining us on this culinary adventure!</h2>
            </article>
        </div>
    </main>


    <footer>
        <?php
        include('footer.php');
        ?>
    </footer>

</body>