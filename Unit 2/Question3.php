<?php

$marks = (int) readline("Enter student's marks (0-100): ");

if ($marks >= 90 && $marks <= 100) {
    echo "Grade: A";
} elseif ($marks >= 75 && $marks <= 89) {
    echo "Grade: B";
} elseif ($marks >= 60 && $marks <= 74) {
    echo "Grade: C";
} elseif ($marks >= 40 && $marks <= 59) {
    echo "Grade: D";
} elseif ($marks < 40 && $marks >= 0) {
    echo "Grade: Fail";
} else {
    echo "Invalid marks entered!";
}
?>
