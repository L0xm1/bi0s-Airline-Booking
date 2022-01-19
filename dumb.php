<!DOCTYPE html>
<html>

<head>
    <title>User Panel</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<p>
<h1 style="color:white;"><b>Welcome User!</b></h1>
<style>
.error {color: #FF0000;}
</style>
</p>
<style>
    h1 {text-align: center;}
    </style>


<body>
    
        <div id="box">
        <form action="booking.php" method="POST">
        <h1 style="font-size:35px;">Flight Booking</h1>
            <p>
                <label>From</label>
                <input name="from" type="text" method="POST">
                
            </p>

           
            <p>
                <label>To  </label>
                <input name="to" type="text" method="POST">
              
            </p>
            
            <p>
                <label> Departure Date</label> 
                <input type="date" name="ddate" />
            </p>
            
            <p>
                <input type="submit" name="btn" value="Search for flights" style="width: 200px; margin: 0 auto;" />
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


    