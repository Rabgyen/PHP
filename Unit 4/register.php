<?php
$errors = [];
$fullname = $username = $email = $age = "";
$passwordStrength = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = trim($_POST["fullname"]);
    $username = trim($_POST["username"]);
    $email    = trim($_POST["email"]);
    $age      = trim($_POST["age"]);
    $password = $_POST["password"];
    $confirm  = $_POST["confirm_password"];

    if (empty($fullname)) {
        $errors['fullname'] = "Full Name is required.";
    } elseif (strlen($fullname) < 3) {
        $errors['fullname'] = "Full Name must be at least 3 characters.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $fullname)) {
        $errors['fullname'] = "Full Name can contain only letters and spaces.";
    }

    if (empty($username)) {
        $errors['username'] = "Username is required.";
    } elseif (!preg_match("/^[a-zA-Z0-9_]{5,15}$/", $username)) {
        $errors['username'] = "Username must be 5–15 characters (letters, numbers, underscore).";
    }

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } elseif (strpos($email, " ") !== false) {
        $errors['email'] = "Email cannot contain spaces.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
        $errors['password'] = "Password must be 8+ chars, include uppercase, lowercase, and a number.";
    } else {

        if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/", $password)) {
            if (strlen($password) >= 12) {
                $passwordStrength = "Strong";
            } elseif (strlen($password) >= 10) {
                $passwordStrength = "Medium";
            } else {
                $passwordStrength = "Weak";
            }
        }
    }

    if ($confirm !== $password) {
        $errors['confirm_password'] = "Passwords do not match.";
    }
    if (empty($age)) {
        $errors['age'] = "Age is required.";
    } elseif (!is_numeric($age)) {
        $errors['age'] = "Age must be numeric.";
    } elseif ($age < 18 || $age > 100) {
        $errors['age'] = "Age must be between 18 and 100.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Secure Registration Form</title>
</head>
<body>

<h1>User Registration</h1>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST" && empty($errors)): ?>

    <h2>Registration Successful!</h2>
    <p><strong>Full Name:</strong> <?= htmlspecialchars($fullname) ?></p>
    <p><strong>Username:</strong> <?= htmlspecialchars($username) ?></p>
    <p><strong>Email:</strong> <?= htmlspecialchars($email) ?></p>
    <p><strong>Age:</strong> <?= htmlspecialchars($age) ?></p>
    <p><strong>Password Strength:</strong> <?= $passwordStrength ?></p>

<?php else: ?>

    <form method="post" action="">

        <label>Full Name:</label><br>
        <input type="text" name="fullname" value="<?= htmlspecialchars($fullname) ?>">
        <span style="color:red;"> <?= $errors['fullname'] ?? "" ?> </span>
        <br><br>

        <label>Username:</label><br>
        <input type="text" name="username" value="<?= htmlspecialchars($username) ?>">
        <span style="color:red;"> <?= $errors['username'] ?? "" ?> </span>
        <br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($email) ?>">
        <span style="color:red;"> <?= $errors['email'] ?? "" ?> </span>
        <br><br>

        <label>Password:</label><br>
        <input type="password" name="password">
        <span style="color:red;"> <?= $errors['password'] ?? "" ?> </span>
        <br><br>


        <label>Confirm Password:</label><br>
        <input type="password" name="confirm_password">
        <span style="color:red;"> <?= $errors['confirm_password'] ?? "" ?> </span>
        <br><br>

        <label>Age:</label><br>
        <input type="number" name="age" value="<?= htmlspecialchars($age) ?>">
        <span style="color:red;"> <?= $errors['age'] ?? "" ?> </span>
        <br><br>

        <button type="submit">Register</button>

    </form>

<?php endif; ?>

</body>
</html>
