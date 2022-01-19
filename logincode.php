<?php
session_start();
require_once "connection.php";

$message = "";
$role="";

if(isset($_POST["btnLogin"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM Users WHERE Username='$username' AND Password='$password'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
           if($row["Role"] == "Admin")
           {
               $_SESSION['AdminUser']=$row["Username"];
               $_SESSION['role'] = $row["Role"];
               header('Location: admin.php');

           }
           elseif($row["Role"] == "User")
           {
            $_SESSION['User']=$row["Username"];
            $_SESSION['role'] = $row["Role"];
            header('Location: user.php');
           }
        }


    }
    else
    {
        $message = "Invalid Username or Password";
        header('Location: login.php');
    }
}

?>
