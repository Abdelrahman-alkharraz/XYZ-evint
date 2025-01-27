<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; 
    $is_admin = isset($_POST['is_admin']) && $_POST['is_admin'] == 'yes';

    if ($is_admin) {
        $sql = "INSERT INTO admin (name, email, phone, password) VALUES (?, ?, ?, ?)";
    } else {
        $sql = "INSERT INTO users (name, email, phone, password) VALUES (?, ?, ?, ?)";
    }

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $name, $email, $phone, $password);
        
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
