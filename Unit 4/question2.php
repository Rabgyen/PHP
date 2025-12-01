<?php
// Initialize variables
$name = $rating = $comment = "";
$submitted = false;

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted = true;

    // Sanitize input
    $name = htmlspecialchars($_POST['name']);
    $rating = htmlspecialchars($_POST['rating']);
    $comment = htmlspecialchars($_POST['comment']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
</head>
<body>

<h1>Feedback Form</h1>

<!-- Feedback Form -->
<form method="post" action="">
    <label>Name:</label><br>
    <input type="text" name="name" value="<?= $name ?>" required><br><br>

    <label>Rating (1–5):</label><br>
    <select name="rating" required>
        <option value="">Select rating</option>
        <?php for ($i = 1; $i <= 5; $i++): ?>
            <option value="<?= $i ?>" <?= ($i == $rating) ? "selected" : "" ?>><?= $i ?></option>
        <?php endfor; ?>
    </select><br><br>

    <label>Comment:</label><br>
    <textarea name="comment" rows="4" cols="30" required><?= $comment ?></textarea><br><br>

    <button type="submit">Submit Feedback</button>
</form>

<?php if ($submitted): ?>
    <hr>
    <h2>Submitted Feedback</h2>
    <p><strong>Name:</strong> <?= $name ?></p>
    <p><strong>Rating:</strong> <?= $rating ?>/5</p>
    <p><strong>Comment:</strong> <?= nl2br($comment) ?></p>
<?php endif; ?>

</body>
</html>
