<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include necessary files
include('db_connect.php');
include('session-check.php');
?>

<body>
    <!-- Header -->
    <header>
        <?php
        include('head.php');
        include('header.php');
        ?>
    </header>
    <!-- Navigation -->
    <nav>
        <?php
        include('menu.php');
        ?>
    </nav>