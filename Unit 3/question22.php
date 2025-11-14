<?php

function calculateAverage(...$marks) {
    return round(array_sum($marks) / count($marks), 2);
}

echo "Average: " . calculateAverage(80, 90, 100);

?>
