<?php

$items = [
    ["name"=>"Laptop", "price"=>75000],
    ["name"=>"Mouse", "price"=>500],
    ["name"=>"Keyboard", "price"=>1200]
];

$subtotal = 0;

echo "SHOPPING BILL<br><br>";

foreach ($items as $item) {
    echo "{$item['name']}: Rs. " . number_format($item['price'], 2) . "<br>";
    $subtotal += $item['price'];
}

$vat = $subtotal * 0.13;        
$total = $subtotal + $vat;

echo "-----------------------------------<br>";
echo "Subtotal: Rs. " . number_format($subtotal, 2) . "<br>";
echo "VAT (13%): Rs. " . number_format($vat, 2) . "<br>";
echo "-----------------------------------<br>";
echo "TOTAL: Rs. " . number_format($total, 2) . "<br>";

?>
