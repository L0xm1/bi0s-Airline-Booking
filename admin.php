<?php
session_start();

if(isset($_SESSION['role']))
{
    if($_SESSION['role']!= 'Admin')
    {
        header('Location: user.php');
    }

}
else
{
    header('Location: login.php');
}




?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<h1 style="color:white;"><b>Welcome Admin!</b></h1>

<style>
    h1 {text-align: center;}
    </style>

