<?php

$tags = ["PHP", "Web Development", "Programming", "MySQL", "Backend"];

echo "Tags as array: ";
print_r($tags);

$tagString = implode(", ", $tags);
echo "<br>Tags as string: $tagString<br>";

echo (in_array("PHP", $tags)) ? "\"PHP\" tag exists<br>" : "\"PHP\" tag not found<br>";
echo (!in_array("JavaScript", $tags)) ? "\"JavaScript\" tag not found<br>" : "";

sort($tags);

echo "Sorted tags: " . implode(", ", $tags) . "<br>";
echo "Total tags: " . count($tags) . "<br>";

?>
