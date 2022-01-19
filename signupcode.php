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

