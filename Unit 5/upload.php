<?php
// Check if form is submitted
if (isset($_POST['upload'])) {

    try {
        // Check if file is uploaded
        if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] == UPLOAD_ERR_NO_FILE) {
            throw new Exception("No file was uploaded.");
        }

        $file = $_FILES['myfile'];
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($file['name']);
        $maxSize = 2 * 1024 * 1024; // 2 MB
        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];

        // Check file size
        if ($file['size'] > $maxSize) {
            throw new Exception("File size exceeds 2 MB limit.");
        }

        // Check file type
        if (!in_array($file['type'], $allowedTypes)) {
            throw new Exception("Invalid file type. Only JPG, PNG, and GIF allowed.");
        }

        // Move uploaded file
        if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
            throw new Exception("Failed to upload file.");
        }

        echo "File uploaded successfully: " . htmlspecialchars($file['name']);
    }
    catch (Exception $e) {
        // Display custom error message
        echo "Error: " . $e->getMessage();
    }
    finally {
        echo "<br>File upload process completed.";
    }
}
?>

<!-- HTML Form for File Upload -->
<form method="post" enctype="multipart/form-data">
    <label>Select a file to upload:</label><br><br>
    <input type="file" name="myfile" required><br><br>
    <button type="submit" name="upload">Upload File</button>
</form>
