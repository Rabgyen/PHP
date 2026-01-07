<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM record WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE record SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: display.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<h2>Edit Customer Record</h2>
<form method="POST" action="">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    Phone: <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required><br><br>
    <input type="submit" name="update" value="Update">
</form>

<a href="display.php">Back to Records</a>
