<?php 
$student = [
    "name" => "Ram Sharma",
    "roll_number" => 25,
    "faculty" => "BCA",
    "semester" => 3,
    "email" => "ram.sharma@example.com"
];

echo "STUDENT PROFILE<br><br>";
foreach ($student as $key => $value) {
    echo ucfirst(str_replace("_"," ",$key)) . ": $value<br>";
}

?>