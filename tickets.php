<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Tickets</title>
    <link rel="shortcut icon" href="img-home/1.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/29267808c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="tickets.css">
</head>
<body>
    <header id="info" >
        <h1 >XYZ Events</h1>
        <div >
        <a id="A" href="index.html">Home</a>
        <a id="A" href="index.php">Events</a>
        <br>
        <h1>Purchase Tickets</h1>
        </div>
    </header>
    <main>
        <form class="tickets"  action="tiketdata.php" method="POST" >
            <br>
            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($_SESSION['email']); ?>" readonly required><br>
            <label for="idevint">ID Event</label><br>
            <input type="text" id="idevint" name="idevint" required><br>
            
            
            <label for=" type and price"> type and price</label>
            <input type="radio" name="type and price" id="normal" value="NORMAL 20$"> <label for="normal" id="normal">NORMAL 20$</label>
            <input type="radio" name="type and price" id="vip" value="VIP 70$"> <label for="vip" id="vip">VIP 70$</label> 
            <br><br>     
         <input type="submit" value="Submit">
        </form>
       
    </main>
    <footer></footer>
</body>
</html>


