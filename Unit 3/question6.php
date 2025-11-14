<?php

$inventory = [
    ["id"=>101, "name"=>"Laptop", "price"=>75000, "stock"=>10],
    ["id"=>102, "name"=>"Mouse", "price"=>500, "stock"=>50],
    ["id"=>103, "name"=>"Keyboard", "price"=>1200, "stock"=>0],
    ["id"=>104, "name"=>"Monitor", "price"=>25000, "stock"=>5]
];

echo "PRODUCT INVENTORY<br><br>";

echo "ID | Name | Price | Stock<br>";
echo "-----------------------------<br>";

$total_value = 0;

foreach ($inventory as $item) {
    echo "{$item['id']} | {$item['name']} | {$item['price']} | {$item['stock']}<br>";
    $total_value += $item['price'] * $item['stock'];
}

echo "<br>OUT OF STOCK:<br>";
foreach ($inventory as $item)
    if ($item['stock'] == 0)
        echo "- {$item['name']} (ID: {$item['id']})<br>";

echo "<br>LOW STOCK:<br>";
foreach ($inventory as $item)
    if ($item['stock'] < 10 && $item['stock'] > 0)
        echo "- {$item['name']} (ID: {$item['id']}) - Only {$item['stock']} left<br>";

echo "<br>Total Inventory Value: Rs. $total_value<br>";

?>
