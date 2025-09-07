<?php
/*a. Write a program that takes two numbers and displays their sum, difference, product, division and modulus */

$num_1 = 2;
$num_2 = 3;

$sum = $num_1 + $num_2;
$difference = $num_1 - $num_2;
$product = $num_1 * $num_2;
$division = $num_1 / $num_2;
$modulus = $num_1 % $num_2;

echo "Sum: $sum <br>";
echo "Difference: $difference<br>";
echo "Product: $product<br>";
echo "Division: $division<br>";
echo "Modulus: $modulus<br>";

/*b.Initialize a variable and apply the following operators step by step: +=, -=, *=, /=, %=*/
$num_3 = 1;
echo "Initial value of num_3: $num_3 <br>";
$num_3 += 4;
echo "num_3 += 4: $num_3 <br>";
$num_3 -= 2;
echo "num_3 -= 2: $num_3 <br>";
$num_3 *= 5;
echo "num_3 *= 5: $num_3 <br>";
$num_3 /= 3;
echo "num_3 /= 3: $num_3 <br>";
$num_3 %= 2;
echo "num_3 %= 2: $num_3<br>";

/*Write a program that checks whether a number is between 1 and 100 and even using logical operators (&&, ||, !). */

    $num_4 = 54;

    if (!($num_4 < 1 || $num_4 > 100) && $num_4 % 2 == 0){
        echo "$num_4 is between 1 and 100 and is even ";
    }else{
        echo "$num_4 is either not between 1 and 100 or is not a even number";
    }

?>