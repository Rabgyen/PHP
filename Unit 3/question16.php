<?php

$prices = [
    "Amazon" => 5000,
    "Flipkart" => 4500,
    "eBay" => 4800,
    "Snapdeal" => 5200
];

echo "PRICE COMPARISON<br><br>";

foreach ($prices as $site => $price)
    echo "$site: Rs. ".number_format($price)."<br>";

$highest = max($prices);
$lowest = min($prices);
$highSite = array_search($highest, $prices);
$lowSite = array_search($lowest, $prices);

$avg = array_sum($prices) / count($prices);

echo "<br>Highest Price: Rs. $highest ($highSite)<br>";
echo "Lowest Price: Rs. $lowest ($lowSite)<br>";
echo "Average Price: Rs. $avg<br>";
echo "Savings: Rs. " . ($highest - $lowest) . " (if you buy from $lowSite)<br>";

echo "<br>Sorted Prices:<br>";
asort($prices);

foreach ($prices as $site => $price)
    echo "$site: Rs. " . number_format($price) . "<br>";

?>
