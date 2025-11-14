<?php
$marks = [
    "Internet Technology" => 85,
    "Data Structure" => 78,
    "Database" => 92,
    "Java Programming" => 88
];

$total = array_sum($marks);
$avg = $total / count($marks);
$percentage = $avg;

$grade = ($percentage >= 80) ? "A" :
        (($percentage >= 60) ? "B" :
        (($percentage >= 40) ? "C" : "F"));

echo "MARK SHEET<br><br>";
foreach ($marks as $subject => $mark) echo "$subject: $mark<br>";

echo "----------------------<br>";
echo "Total Marks: $total<br>";
echo "Average: $avg<br>";
echo "Percentage: $percentage%<br>";
echo "Grade: $grade<br>";

?>