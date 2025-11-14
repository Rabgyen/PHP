<?php

$num1 = 15.567;
$num2 = 7.234;

$n1 = round($num1, 2);
$n2 = round($num2, 2);

echo "Addition: $n1 + $n2 = " . round($n1+$n2, 2) . "<br>";
echo "Subtraction: $n1 - $n2 = " . round($n1-$n2, 2) . "<br>";
echo "Multiplication: $n1 × $n2 = " . round($n1*$n2, 2) . "<br>";
echo "Division: $n1 ÷ $n2 = " . round($n1/$n2, 2) . "<br>";

?>
