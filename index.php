<?php
include("config.php");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM evint";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link rel="short icon" href="img-home/1.png" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <h1 id="evv">XYZ evint </h1>
        <a href="index.html" id="aevnt">home</a>
    </header>

    <main>
        <table class="tableevent" border="solid">
            <tr>
                <th>ID</th>
                <th>Day</th>
                <th>Time</th>
                <th>Location</th>
                <th>name</th>
                <th>Capacity</th>
                <th>description</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['day']}</td>
                        <td>{$row['time']}</td>
                        <td>{$row['location']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['Capacity']}</td>
                        <td>{$row['description']}</td>
                        
                    </tr>";
                }
            }
            ?>
        </table>
        <center><button> <a href="tickets.php" id="ev">reservation</a></button></center>
    </main>

    <footer>
    <script src="app.js"> </script>

    </footer>

</body>

</html>

<?php
$conn->close();
?>
