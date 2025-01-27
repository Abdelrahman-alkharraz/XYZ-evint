<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $delete_sql = "DELETE FROM evint WHERE id=$id";
    if ($conn->query($delete_sql) === TRUE) {
        header("Location: admin2.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$conn->close();
?>
