<?php
$students = [
    ["Ram", 20, "BCA"],
    ["Sita", 19, "BIT"],
    ["Hari", 21, "BCA"]
];

for ($i=0; $i<count($students); $i++) {
    echo "Student ".($i+1).": {$students[$i][0]}, Age: {$students[$i][1]}, Faculty: {$students[$i][2]}<br>";
}

?>