<!DOCTYPE html>
<html>
<head>
  <h1 style="color:white;">Flights Available</h1>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
include "connection.php"; 
session_start();
if($_SESSION['access']!="YES"){
  header('Location:login.php');
}
else{
  echo session_id();
  // mysql query to display the flight details with the user selected departure ,arrival and departurre date
  $sql="SELECT * FROM flights WHERE departure= '".$_SESSION['from']."' AND arrival='".$_SESSION['to']."' AND departuredate= '".$_SESSION['ddate']."'  ";
  if(isset($_SESSION['btnsearch'])){ 
    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
        echo "<table border=3 style=color:white >";
        echo "<tr>";
        echo "<td>DEPARTURE</td>";
        echo "<td>ARRIVAL</td>";
        echo "<td>DEPARTURE DATE</td>";
        echo "<td>DEPARTURE TIME</td>";
        echo "<td>ARRIVAL TIME</td>";
        echo "<td>FLIGHT NAME</td>";
        echo "<td>PRICE</td>";
        echo "<td>BOOK FLIGHT</td>";
        //iterates through the table and returns a row
        while($row = mysqli_fetch_array($result)){
          echo "<tr>";
          echo "<td>" . $row['departure'] . "</td>";
          echo "<td>" . $row['arrival'] . "</td>";
          echo "<td>" . $row['departuretime'] . "</td>";
          echo "<td>" . $row['departuredate'] . "</td>";
          echo "<td>" . $row['arrivaltime'] . "</td>";
          echo "<td>" . $row['flightname'] . "</td>";
          echo "<td>" . $row['price'] . "</td>";
          echo"<td>"."<a class='btn' href='upload.php' style=color:white> <b>Book Flight</b></a>"."</td>";
          echo "</tr>";
        }
        echo "</table>";
        //frees the memory associated with $result variable
        mysqli_free_result($result);
      }
      else{
        echo 'RECORDS NOT FOUND';
  }
  



}
}

else{
  echo "Nope";
}
}

?>

</body>
</html>