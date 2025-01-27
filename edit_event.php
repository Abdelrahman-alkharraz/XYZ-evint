<?php
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $name =$_POST['name'];
    $Capacity = $_POST['Capacity'];
    $description = $_POST['description'];


    $update_sql = "UPDATE evint SET day='$day', time='$time', location='$location',name='$name',Capacity='$Capacity',description='$description' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        header("Location: admin2.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
$conn->close();
?>
