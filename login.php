<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<h1 style="color:white;text-align: center;"><b>Welcome to Meta Airline Booking</b></h1>
<h2 style="color:white;text-align: center;"><b>LOGIN  PAGE</b></h2>

<body>
    <div id="frm">
        <form action="" method="POST">
            <p>
                <label><b> Username </b> </label>
                    <input type="text" name="username" required value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];}?>">
            </p>

            <p>
                <label><b>Password:</b></label>
                <input type="password" name="password" required value="<?php if(isset($_COOKIE['password'])){echo $_COOKIE['password'];}?>">
            </p>
    
            <p>
                <?php echo $message?>
                <input type="submit" name="btnLogin" value="Login:" >
            </p>
            <p>
                <label><input type="checkbox" name="remember" <?php if(isset($_COOKIE['user']) && isset($_COOKIE['password'])){ echo "checked";}?>>Remember Me</label>

        </form>
    </div>
</body>
</head>
</html>

<?php
session_start();
require_once "connection.php";
$message="";
$role="";

//isset($_POST["btnLogin"]) checks if the form is submitted or not
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
            //if the role is admin it redirects to admin panel else to user page
           if($row["Role"] == "Admin")
           {
               $_SESSION['AdminUser']=$row["Username"];
               $_SESSION['role'] = $row["Role"];
               
               header('Location: admin.php');

           }
           elseif($row["Role"] == "User")
           {
            if(isset($_POST['remember'])){
                //set cookie
                setcookie("user",$row['Username'],time()+(86400*30));
                setcookie("password",$row['Password'],time()+(86400*30));
            }
            $_SESSION['User']=$row["Username"];
            $_SESSION['access']="YES";
            header('Location: user.php');
            
           }
        }


    }
    else
    {
        $message = "Invalid Username or Password";
        header('Location: signup.php');
    }
}

?>
