<?php

session_start();

if (isset($_POST['reset'])) {
    unset($_SESSION['visit_count']);
}

if (isset($_SESSION['visit_count'])) {
    $_SESSION['visit_count'] += 1;
} else {
    $_SESSION['visit_count'] = 1;
}

echo "<h2>You have visited this page " . $_SESSION['visit_count'] . " times in this session.</h2>";
?>

<form method="post">
    <button type="submit" name="reset">Reset Counter</button>
</form>
