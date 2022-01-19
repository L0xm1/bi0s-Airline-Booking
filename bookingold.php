<!DOCTYPE html>
<html>
<head>
  <h1 style="color:white;">Flights Available</h1>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <table style="color:white"  border="3">
  <tr>
    <td>FROM</td>
    <td>TO</td>
    <td>DATE</td>
    <td>DEPARTURE TIME</td>
    <td>ARRIVAL TIME</td>
    <td>FLIGHT NAME</td>
    <td>PRICE</td>
    <td>Book Flight</td>
  </tr>

<?php
session_start();
include "connection.php"; // Using database connection file here

  if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_array($result)){
      ?>
      <tr>
        <td><?php echo $data['departure'];?></td>
        <td><?php echo $data['arrival']; ?></td>
        <td><?php echo $data['departuredate']; ?></td>
        <td><?php echo $data['departuretime']; ?></td>
        <td><?php echo $data['arrivaltime']; ?></td>
        <td><?php echo $data['flightname']; ?></td>
        <td><?php echo $data['price']; ?></td>
      </tr>	

<?php
}
}

?>
</table>
</body>
</html>








































