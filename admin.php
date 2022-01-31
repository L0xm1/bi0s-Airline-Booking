<?php
session_start();
//if the role is admin then only they can view this page
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
<body>
    <h1 style="color:white;"><b>Welcome Admin!</b></h1>
    

<?php
include"connection.php";
$sqlquery="SELECT * FROM flights";
if($result = mysqli_query($conn, $sqlquery)){
    if(mysqli_num_rows($result) > 0){
        echo "<table border=3 style=color:white >";
        echo "<tr>";
        echo "<td>FLIGHT No</td>";
        echo "<td>DEPARTURE</td>";
        echo "<td>ARRIVAL</td>";
        echo "<td>DEPARTURE DATE</td>";
        echo "<td>DEPARTURE TIME</td>";
        echo "<td>ARRIVAL TIME</td>";
        echo "<td>FLIGHT NAME</td>";
        echo "<td>PRICE</td>";
        echo "<td>EDIT</td>";
        echo "<td>DELETE</td>";
        

        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td>" . $row['flightno'] . "</td>";
            echo "<td>" . $row['departure'] . "</td>";
            echo "<td>" . $row['arrival'] . "</td>";
            echo "<td>" . $row['departuredate'] . "</td>";
            echo "<td>" . $row['departuretime'] . "</td>";
            echo "<td>" . $row['arrivaltime'] . "</td>";
            echo "<td>" . $row['flightname'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo '<td><a class="btn-btn=primary" href="modify.php?id='. $row['flightno'] .'" role="button" >EDIT</a></td>';//modify.php?id= here we are passing id parameter in the url[id = the flightno of the row we want to modify]
            echo '<td><a class="btn-btn=primary" href="delete.php?id='. $row['flightno'] .'" role="button" >DELETE</a></td>';
    
            echo"</tr>";
        }
        echo "</table>";
    }
}
mysqli_connection(close);
?>

</body>
</html>

