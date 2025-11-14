<?php

function createProfile($name, $role="student", $status="active") {
    echo "Name: $name<br>";
    echo "Role: $role<br>";
    echo "Status: $status<br><br>";
}

createProfile("Ram");
createProfile("Sita", "Teacher");
createProfile("Hari", "Admin", "inactive");

?>
