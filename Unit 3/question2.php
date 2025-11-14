<?php

$cities = ['Kathmandu', 'Pokhara', 'Lalitpur', 'Bhaktapur', 'Biratnagar'];

echo "First City: {$cities[0]}<br>";
echo "Last City: " . $cities[count($cities) - 1] . "<br>";
echo "Total Cities: " . count($cities) . "<br>";
echo "City at index 2: {$cities[2]}<br>";


?>