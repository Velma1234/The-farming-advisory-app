<!-- handling Php logic -->
<?php
// database connection details 
$servername= "localhost";
$username = "root";
$password = "Atienovelma@1";
$dbname = "ustawifarmersdb";
// connecting to database using the details
$conn = new mysqli($servername,$username,$password,$dbname);

// checking connection if not it stops immediately showing an error
if($conn->connect_error){
die("conection failed" .$conn->connect_error);
}

// processing the form  - checkinhg if form is  submitted

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['registerBTN'])){
    $firstname=$_POST['firstname'];// grabs value of user input from form to store in variables
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];

    //encrypting password into unreadable text
   $password_hash =password_hash($password, PASSWORD_DEFAULT);

   //inserting data into the database using statement

   $registerData = $conn->prepare(
    "INSERT INTO farmers(firstname,lastname,username,email,password_hash)

   VALUES (?,?,?,?,?)"
   );

   $registerData -> bind_param("sssss",$firstname, $lastname,$username,$email,$password_hash);

   if($registerData->execute()){
    $success= "registration succesfull";

    echo "<script>alert('registration succesfull'); window.location.href='login.php';</script>";
   }else{
    $error = "error:".$registerData->error;
   }
   $registerData->close();
}
$conn->close(); // closing the connection
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
    <div class="registerForm">



        <form method="POST" action="register.php" id="registerForm">
            <label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" placeholder="Enter your first name"></input> <br> <br>

            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" placeholder="Enter your last name"></input> <br><br>

            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Enter your username name"></input> <br><br>

            <label for="email">Email</label>
            <input type="email" name="email" id="email"  placeholder="Enter your email"></input><br> <br>

            <label for="password">Password</label>
            <input type="password" name="password"  id="password" placeholder="Enter your password"></input> <br><br>

            <button type="submit" name="registerBTN" id="registerBTN" >REGISTER</button>


        </form>
<br>
           <h4>Have an account? click <a href="login.php"> here </a>to Login</h4>

    </div>
</body>
</html>