<?php

echo "OTP Generator<br>";

for ($i = 1; $i <= 4; $i++) {
    echo "OTP $i: " . rand(100000, 999999) . "<br>";
}

?>
