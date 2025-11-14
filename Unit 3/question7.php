<?php

$username = "  Ram123  ";
$username = trim($username);
$len = strlen($username);

echo "Username: $username<br>";
echo "Length: $len characters<br>";

if ($len >= 5 && $len <= 15)
    echo "Username is valid (5–15 characters)<br>";
else
    echo "Invalid username<br>";

?>
