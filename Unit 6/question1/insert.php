<?php
include 'db.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO record (name, email, phone) VALUES ('$name', '$email', '$phone')";
    if($conn->query($sql) === TRUE){
        echo "Record inserted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<h2>Insert Customer Details</h2>
<form method="POST" action="">
    Name: <input type="text" name="name" required><br><br>
    Email: <input type="email" name="email" required><br><br>
    Phone: <input type="text" name="phone" required><br><br>
    <input type="submit" name="submit" value="Insert">
</form>

<a href="display.php">View Records</a>
