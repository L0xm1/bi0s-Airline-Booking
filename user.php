<?php
session_start();
if($_SESSION['access']!="YES"){
    header('Location:login.php');
}
else{
    echo session_id();
    $_SESSION['from'] = $_POST['from'];
    $_SESSION['to'] = $_POST['to'];
    $_SESSION['ddate'] = $_POST['ddate'];
    $_SESSION['btnsearch'] = $_POST['btnsearch'];
    if(isset($_SESSION["btnsearch"])){
        if($_SESSION['from'] !='' && $_SESSION['to'] != '' && $_SESSION['ddate']!= ''){
            header('Location: booking.php');
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<p>
<h1 style="color:white;text-align: center;"><b>Welcome <?php echo $_SESSION['User']?></b></h1>
<style>
.error {color: #FF0000;}
</style>
</p>


<body>
        <div id="box">
        <form action="" method= "POST">
        
        <h1 style="font-size:35px;">Flight Booking</h1>
            <p>
                <label>From</label>
                <input name="from" type="text" required>          
            </p>

           
            <p>
                <label>To  </label>
                <input name="to" type="text" required>
              
            </p>
            
            <p>
                <label> Departure Date</label> 
                <input type="date" name="ddate" required>
            </p>
            
            <p>
                <input type="submit" name="btnsearch" value="Search for flights" style="width: 200px; margin: 0 auto;" >
            </p>
            
<style>
label{
    cursor: pointer;
    display: inline-block;
    padding: 3px 6px;
    text-align: left;
    width: 100px;
    vertical-align: top;
        
    }
input{
    font-size: 22px;
}
</style>


    
