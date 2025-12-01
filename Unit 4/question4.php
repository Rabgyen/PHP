<?php

$errors = [];
$size = $_POST['size'] ?? '';
$toppings = $_POST['toppings'] ?? [];
$crust = $_POST['crust'] ?? '';
$isPosted = $_SERVER['REQUEST_METHOD'] === 'POST';

if ($isPosted) {
    if (empty($size)) {
        $errors[] = "Please select a pizza size.";
    }
    if (empty($toppings)) {
        $errors[] = "Please select at least one topping.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pizza Order Form</title>
</head>
<body>

<h1>Pizza Order Form</h1>


<?php if (!empty($errors)): ?>
    <div style="color: red;">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" action="">


    <h3>Choose Size:</h3>
    <label>
        <input type="radio" name="size" value="Small"
            <?= ($size === "Small") ? "checked" : "" ?>>
        Small
    </label><br>

    <label>
        <input type="radio" name="size" value="Medium"
            <?= ($size === "Medium") ? "checked" : "" ?>>
        Medium
    </label><br>

    <label>
        <input type="radio" name="size" value="Large"
            <?= ($size === "Large") ? "checked" : "" ?>>
        Large
    </label><br><br>



    <h3>Select Toppings:</h3>
    <?php
    $allToppings = ["Cheese", "Mushroom", "Onion", "Olive"];
    foreach ($allToppings as $top) {
        $checked = in_array($top, $toppings) ? "checked" : "";
        echo "<label><input type='checkbox' name='toppings[]' value='$top' $checked> $top</label><br>";
    }
    ?>
    <br>



    <h3>Choose Crust Type:</h3>
    <select name="crust">
        <option value="">Select crust</option>
        <option value="Thin" <?= ($crust === "Thin") ? "selected" : "" ?>>Thin</option>
        <option value="Regular" <?= ($crust === "Regular") ? "selected" : "" ?>>Regular</option>
        <option value="Thick" <?= ($crust === "Thick") ? "selected" : "" ?>>Thick</option>
    </select>
    <br><br>

    <button type="submit">Submit Order</button>
</form>

<hr>

<?php if ($isPosted && empty($errors)): ?>
    <h2>Your Pizza Order</h2>
    <p><strong>Size:</strong> <?= htmlspecialchars($size) ?></p>
    <p><strong>Toppings:</strong> <?= htmlspecialchars(implode(", ", $toppings)) ?></p>
    <p><strong>Crust:</strong> <?= htmlspecialchars($crust) ?></p>
<?php endif; ?>

</body>
</html>
