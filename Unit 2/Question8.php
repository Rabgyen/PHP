<?php
$number = 6;
$factorial = 1;
$i = 1;

do {
    $factorial *= $i;
    $i++;
} while ($i <= $number);

echo "Factorial of $number is: $factorial";
?>
