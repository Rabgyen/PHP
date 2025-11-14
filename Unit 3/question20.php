<?php

function celsiusToFahrenheit($celsius) {
    return ($celsius * 9/5) + 32;
}

echo celsiusToFahrenheit(0) . "<br>";
echo celsiusToFahrenheit(25) . "<br>";
echo celsiusToFahrenheit(100) . "<br>";

?>
