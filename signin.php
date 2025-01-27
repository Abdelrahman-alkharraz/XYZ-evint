<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
// user
    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        header("Location: index.php");
        exit();
    } else {

//admin
        $sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $admin = mysqli_fetch_assoc($result);
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['email'] = $admin['email'];
            header("Location: admin2.php");
            exit();
        } else {
            echo "Invalid email or password. Please try again.";
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <link rel="shortcut icon" href="img-home/1.png" type="image/x-icon">
<link rel="stylesheet" href="singin.css">
</head>
<body >
    <header>
        <h1 id="signin">XYZ Sign In</h1>
    </header>
    <main>
        <form action="signin.php" method="post" class="signin">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <br>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <br><br>
            <input type="submit" value="Submit" style="background-color: blue;">
        </form>
    </main>
    <footer>
    <a href="index.html" id="hevnt2">Home</a>

    <script src="signin.js"> </script>
    </footer>
</body>
</html>
