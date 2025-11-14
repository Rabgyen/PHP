<?php

$foods = ["Momo", "Pizza", "Burger", "Pasta", "Sushi"];

echo "All Foods:<br>";
foreach ($foods as $food) {
    echo "$food<br>";
}

echo "<br>Numbered List:<br>";
$index = 1;
foreach ($foods as $food) {
    echo "$index. $food<br>";
    $index++;
}

?>
