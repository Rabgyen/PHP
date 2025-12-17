<?php
if (isset($_COOKIE['user_color'])) {
    echo "Your selected color is: " . $_COOKIE['user_color'];
} else {
    echo "No color selected yet.";
}
?>
