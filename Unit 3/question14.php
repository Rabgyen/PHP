<?php

$birthdate = "2000-05-15";

echo "Birthdate: " . date("F d, Y", strtotime($birthdate)) . "<br>";
echo "Current Date: " . date("F d, Y") . "<br>";

$age = date_diff(date_create($birthdate), date_create("today"))->y;

echo "Age: $age years old<br>";

?>
