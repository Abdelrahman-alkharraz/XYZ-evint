<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="shortcut icon" href="img-home/1.png" type="image/x-icon">
    <link rel="stylesheet" href="regester.css">

</head>

<body >
    <header>
        <h1 id="Register">xyz Register</h1>
    
    </header>

    <main>
        <form action="data_re.php" class="register" method="POST">
            <div id="regester">
                <br>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your Name" required>
            <br>
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <br>
            <label for="phone">Phone numper</label>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone" required>
            <br>
            
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Enter your password" required>
            <br>
            
            <label for="is_admin">Register as Admin</label>
            <input type="checkbox" name="is_admin" id="is_admin" value="yes">
            <br>
            
            <input type="submit" value="Submit" style="background-color: rgb(16, 210, 216);">
            <input type="reset" value="Reset" style="background-color: brown;">
            
            </div>

 
            
        </form>
    </main>
    
    <footer>

        <a href="index.html" id="hevnt">Home</a>
    <script src="regester.js"> </script>

    </footer>
</body>

</html>
