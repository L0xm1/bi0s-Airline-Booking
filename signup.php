<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<h1 style="color:white;"><b>Welcome to Meta Airline Booking</b></h1>


<style>
    h1 {text-align: center;}
    
    </style>



<body>
    <div id="frm">
        <form action="" method="POST">
            <p>
                
                <label><b>Username:</b></label>
                <input type="text" name="username" />
            </p>
            <p>
                <label><b>Password:</b></label>
                <input type="password" name="password" />
            </p>
    
            <p>
                <?php echo $message; ?>
                <input type="submit" name="btnLogin" value="Signup:" />
                <a href=login.php> Account already exists? Click to login</a>
            </p>
        </form>
    </div>
</body>
</head>
<?php

$servername ="localhost";
$name= "L0xmi";
$pass = "password";
$database = "login";
$con = mysqli_connect($servername,$name,$pass,$database);
$username = $_POST["username"];
$password = $_POST["password"];
$query = "SELECT * FROM Users where Username = '$username'";
$result = mysqli_query($con,$query);
$num = mysqli_num_rows($result);
$role="User";

if($num == 1)
{
     echo "Username already taken";
}
else
{
    $sql = "INSERT INTO Users (Username,Password,Role) VALUES ('$username','$password','$role')";
    mysqli_query($con,$sql);
    echo "Signup Successful!";
    header('Location: login.php');
   

}
?>


