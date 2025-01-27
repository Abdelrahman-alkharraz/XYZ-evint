<?php
include("config.php");


$day = $_POST['day'];
$time = $_POST['time'];
$location = $_POST['location'];
$name = $_POST['name'];
$Capacity = $_POST['Capacity'];
$description = $_POST['description']; 


$insert_sql = "INSERT INTO evint (day, time, location, name, Capacity, description) 
               VALUES ('$day', '$time', '$location', '$name', '$Capacity', '$description')";

if ($conn->query($insert_sql) === TRUE) {
    header("Location: admin2.php");

    echo "Event added successfully";
} else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
}

$conn->close();
?>
