<?php
if (isset($_POST['color'])) {
    $color = $_POST['color'];

    setcookie("user_color", $color, time() + 86400);

    echo "Color saved successfully.";
}
?>

<form method="post">
    <label>Select your favorite color:</label><br><br>
    <select name="color" required>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
    </select><br><br>
    <button type="submit">Save Color</button>
</form>
