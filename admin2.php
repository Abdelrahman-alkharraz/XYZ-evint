<?php
include("config.php");

$action = $_GET['action'] ?? '';
$id = $_GET['id'] ?? '';
$day = '';
$time = '';
$location = '';
$name = '';
$Capacity = '';
$description = '';

if ($action == 'edit' && $id) {
    $edit_sql = "SELECT * FROM evint WHERE id = $id";
    $edit_result = $conn->query($edit_sql);
    if ($edit_result && $edit_result->num_rows > 0) {
        $row = $edit_result->fetch_assoc();
        $day = $row['day'];
        $time = $row['time'];
        $location = $row['location'];
        $name = $row['name'];
        $Capacity = $row['Capacity'];
        $description = $row['description'];
    }
}

$result = $conn->query("SELECT * FROM evint");
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Event Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1 id="evv">XYZ Event - Admin</h1>
    <a href="index.php" id="aevnt">Back to Home</a>
</header>

<main>
    <form method="post" action="<?php echo $action == 'edit' && $id ? 'edit_event.php' : 'add_event.php'; ?>" id="ADMIN">
        <label for="day">Day:</label>
        <input type="date" name="day" id="day" value="<?php echo htmlspecialchars($day); ?>" required><br>
        <label for="time">Time:</label>
        <input type="text" name="time" id="time" value="<?php echo htmlspecialchars($time); ?>" required><br>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($location); ?>" required><br>
        <label for="name">name</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" required><br>
        <label for="Capacity">Capacity</label>
        <input type="text" name="Capacity" id="Capacity" value="<?php echo htmlspecialchars($Capacity); ?>" required><br>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10" required><?php echo htmlspecialchars($description); ?></textarea><br>

        <?php if ($action == 'edit' && $id): ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit">Save Changes</button>
        <?php else: ?>
            <button type="submit" id="submitButton">Add Event</button>
        <?php endif; ?>
    </form>

    <hr>

    <h2>Saved Events</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Day</th>
            <th>Time</th>
            <th>Location</th>
            <th>Name</th>
            <th>Capacity</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['day']; ?></td>
                    <td><?php echo $row['time']; ?></td>
                    <td><?php echo $row['location']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['Capacity']; ?></td>
                    <td><?php echo $row['description']; ?></td>
                    <td>
                        <a href="admin2.php?action=edit&id=<?php echo $row['id']; ?>">Edit</a> |
                        <a href="delete_event.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this event?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan='8'>No events found</td></tr>
        <?php endif; ?>
    </table>
</main>

<footer>
    <script src="app.js"></script>
</footer>

</body>
</html>
