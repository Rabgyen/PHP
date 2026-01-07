<?php
include 'db.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM record WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: display.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
