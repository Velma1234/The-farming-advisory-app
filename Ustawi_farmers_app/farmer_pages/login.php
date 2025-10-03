<?php
// --- Database connection ---
$servername= "localhost";
$username = "root";
$password = "Atienovelma@1";
$dbname = "ustawifarmersdb";

$conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if($conn->connect_error){
    die("Connection failed: " .$conn->connect_error);
}

// --- Process Login ---
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare query to fetch user
    $loginQuery = $conn->prepare("SELECT farmerID, firstname, password_hash FROM farmers WHERE email = ?");
    $loginQuery->bind_param("s", $email);
    $loginQuery->execute();
    $loginQuery->store_result();

    if($loginQuery->num_rows > 0){
        $loginQuery->bind_result($email, $username, $password_hash);
        $loginQuery->fetch();

        // Verify the password
        if(password_verify($password, $password_hash)){
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            echo "<script>alert('Login successful. Welcome, $username!'); window.location.href='weather.php';</script>";
        } else {
            echo "<script>alert('Invalid password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No account found with this email.');</script>";
    }

    $loginQuery->close();
}
$conn->close();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ustawi</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="register.php">Register</a></li>
            <li><a href="weather.php">Weather</a></li>
            <li><a href="planting_seasons.php">Seasons</a></li>
             <li><a href="market_prices.php">Market</a></li>
        </ul> 
    </nav> 
    <h1>Ustawi Farmers</h1>
    <div class="loginForm">
        <form method="POST" action="login.php">

            <label for="email">Email</label>
            <input type="email" name="email"  placeholder="Enter your email"></input> <br><br>

            <label for="password">Password</label>
            <input type="password" name="password"  placeholder="Enter your password"></input> <br><br>

            <button type="submit" class="loginBtn">LOGIN</button>


        </form>
<br>

           <h5>Don't have an account Yet? click   <a href="login.php">here </a>to register</h5>


    </div>
</body>
</html>