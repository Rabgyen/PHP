<?php

$students = ["Ram", "Sita", "Hari"];

echo "Initial students: " . implode(", ", $students) . "<br>";

$students[] = "Gita";
$students[] = "Laxman";

echo "After adding: " . implode(", ", $students) . "<br>";

array_pop($students);

echo "After removing last: " . implode(", ", $students) . "<br>";

echo "Total students: " . count($students) . "<br>";

echo (in_array("Ram", $students)) 
        ? "Ram is in the list<br>" 
        : "Ram is not in the list<br>";

?>
