<?php
$errors = [];
$name = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST['username']);

    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }

    if (!isset($_FILES['profile_pic']) || $_FILES['profile_pic']['error'] === UPLOAD_ERR_NO_FILE) {
        $errors[] = "Profile picture is required.";
    } else {
        $file = $_FILES['profile_pic'];
        $fileName = $file['name'];
        $fileTmp  = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileErr  = $file['error'];

        if ($fileErr !== UPLOAD_ERR_OK) {
            $errors[] = "File upload failed. Error code: $fileErr";
        }

        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($ext, $allowedExt)) {
            $errors[] = "Invalid file type. Only JPG, PNG, GIF allowed";
        }

        if ($fileSize > (2 * 1024 * 1024)) {
            $errors[] = "File size exceeds 2MB limit";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile Picture Upload</title>
</head>
<body>

<h1>Profile Picture Upload</h1>

<?php if ($_SERVER["REQUEST_METHOD"] !== "POST" || !empty($errors)): ?>

    <?php if (!empty($errors)): ?>
        <h2>Upload Errors:</h2>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $e): ?>
                    <li><?= htmlspecialchars($e) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="" enctype="multipart/form-data">
        <label>User Name:</label><br>
        <input type="text" name="username" value="<?= htmlspecialchars($name) ?>"><br><br>

        <label>Select Profile Picture:</label><br>
        <input type="file" name="profile_pic" accept="image/*"><br><br>

        <button type="submit">Upload</button>
    </form>

<?php else: ?>

    <?php
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }

    $destination = "uploads/" . basename($fileName);
    move_uploaded_file($fileTmp, $destination);

    $fileSizeMB = round($fileSize / (1024*1024), 2);
    ?>

    <h2>Profile Picture Uploaded Successfully!</h2>

    <p><strong>User Name:</strong> <?= htmlspecialchars($name) ?></p>

    <h3>File Information:</h3>
    <p><strong>File Name:</strong> <?= htmlspecialchars($fileName) ?></p>
    <p><strong>File Size:</strong> <?= $fileSizeMB ?> MB</p>
    <p><strong>File Type:</strong> <?= htmlspecialchars($fileType) ?></p>
    <p><strong>Saved Location:</strong> <?= htmlspecialchars($destination) ?></p>

    <img src="<?= $destination ?>" width="200px" style="margin-top:10px; border:1px solid #ccc;">

<?php endif; ?>

</body>
</html>
