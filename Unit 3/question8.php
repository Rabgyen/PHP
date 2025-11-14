<?php

$email = "RAM.Sharma@EXAMPLE.com";
$clean = strtolower(trim($email));

echo "Original: $email<br>";
echo "Cleaned: $clean<br>";

if (strpos($clean, "@") !== false) {
    echo "Valid email format<br>";
    list($user, $domain) = explode("@", $clean);
    echo "Username: $user<br>";
    echo "Domain: $domain<br>";
} else {
    echo "Invalid email<br>";
}

?>
