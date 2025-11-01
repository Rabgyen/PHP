<?php
$count = 0;

echo "Enter up to 10 numbers (program stops if you enter a negative number):\n";

while ($count < 10) {

    $num = (int) readline("Enter number " . ($count + 1) . ": ");

    if ($num < 0) {
        echo "Negative number entered! Stopping input.\n";
        break;
    }

    echo "You entered: $num\n";
    $count++;
}
?>
