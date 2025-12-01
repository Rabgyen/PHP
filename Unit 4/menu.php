<?php
// Detect which page is requested
$page = $_GET['page'] ?? 'home';   // Default to "home"

function displayContent($page) {
    switch ($page) {
        case 'home':
            echo "<h2>Welcome to the Home Page</h2>
                  <p>This is the main landing page of our site.</p>";
            break;

        case 'about':
            echo "<h2>About Us</h2>
                  <p>This website was created to demonstrate dynamic PHP pages.</p>";
            break;

        case 'contact':
            echo "<h2>Contact Us</h2>
                  <p>You can reach us at example@email.com.</p>";
            break;

        default:
            echo "<h2>404 - Page Not Found</h2>
                  <p>The page you are looking for doesn't exist.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Menu</title>
</head>
<body>

<h1>My Website</h1>

<!-- Navigation Menu -->
<nav>
    <a href="menu.php?page=home">Home</a> |
    <a href="menu.php?page=about">About</a> |
    <a href="menu.php?page=contact">Contact</a>
</nav>

<hr>

<!-- Dynamic Content Section -->
<div>
    <?php displayContent($page); ?>
</div>

</body>
</html>
