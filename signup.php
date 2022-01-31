<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<h1 style="color:white;text-align: center;"><b>Welcome to Meta Airline Booking</b></h1>
<h2 style="color:white; text-align: center;"><b>SIGN UP PAGE</b></h2>

<body>
    <div id="frm">
        <form action="" method="POST">
            <p>
                <label><b>Username:</b></label>
                <input type="text" name="username" required />
            </p>
            <p>
                <label><b>Password:</b></label>
                <input type="password" name="password" required />
            </p>
    
            <p>
                <input type="submit" name="btnLogin" value="Signup:" />
                <a href=login.php> Account already exists? 
                Click to login</a>
            </p>
        </form>
    </div>
</body>
</head>
</html>


<?php

//includes the database connection file
include"connection.php";

//$_POST['username] collects the username from the form
$username = $_POST["username"];
$password = $_POST["password"];

// mysql query to select users with the user name provided through $_POST
$query = "SELECT * FROM Users where Username = '$username'";

//mysqli_query($conn,$query) executes the query 
$result = mysqli_query($conn,$query);

// mysqli_num_rows function is used to get the number of rows returned from a select query
$num = mysqli_num_rows($result);
$role="User";

//if the $num==1 which means there exists a row with the same username 
if($num == 1){
    echo"Username already taken";
}
else{
    $sql = "INSERT INTO Users (Username,Password,Role) VALUES ('$username','$password','$role')";
    mysqli_query($conn,$sql);
    echo"Signup Successful!";
    header('Location: login.php');
}
?>


