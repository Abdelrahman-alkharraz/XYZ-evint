<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $idevint = $_POST['idevint'];
    $user_id = $_SESSION['user_id'];
    $type_and_price = $_POST['type_and_price'];

    $sql = "INSERT INTO tickets (email, idevint, user_id, type_and_price) VALUES ('$email', '$idevint', '$user_id', '$type_and_price')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Records added to DB<br>";
    } else {
        echo "Failed: " . mysqli_error($conn) . "<br>";
    }

    $sql = "SELECT * FROM tickets WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    echo "This is the number of rows: " . mysqli_num_rows($result) . "<br>";

    if (mysqli_num_rows($result) > 0) {
        echo "<table class='tableinfo'>";
        echo "<tr>";
        echo "<th>User ID</th>";
        echo "<th>Email</th>";
        echo "<th>ID Event</th>";
        echo "<th>Type and Price</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['idevint'] . "</td>";
            echo "<td>" . $row['type_and_price'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No records found.<br>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Tickets</title>
    <link rel="stylesheet" href="tiketdata.css">
</head>
<body>
    <div class="container">
    </div>
    <a id="A" href="index.html">Home</a>
        <a id="A" href="index.php">Events</a></body>
</html>