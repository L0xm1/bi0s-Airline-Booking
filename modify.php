<?php
include"connection.php";
$id=$_GET['id'];//returns the value of id we passed as parametersin the url
$row="SELECT * FROM flights WHERE flightno='".$id."'";
$sql=mysqli_query($conn,$row);
$result = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modify </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="POST" action="">
    <input type="hidden" name="id" required value="<?php echo $result['flighno'];?>">
    <input type="text" name="departure" placeholder="Enter departure destination" required value="<?php echo $result['departure'];?>">
    <input type="text" name="arrival" placeholder="Enter arrival destination"  required value="<?php echo $result['arrival'];?>" >
    <input type="date" name="departuredate" placeholder="Enter departure date" required value="<?php echo $result['departuredate'];?>" >
    <input type="time" name="departuretime" placeholder="Enter departure time" required value="<?php echo $result['departuretime'];?>" >
    <input type="time" name="arrivaltime" placeholder="Enter arrival time"  required value="<?php echo $result['arrivaltime'];?>" >
    <input type="text" name="flightname" placeholder="Enter flightname" required value="<?php echo $result['flightname'];?>">
    <input type="price" name="price" placeholder="Enter price" required value="<?php echo $result['price'];?>">
    <input type="submit" name="save" value="Update">
</form> 

<?php
include"connection.php";
$departure=$_POST['departure'];
$arrival=$_POST['arrival'];
$departure_date=$_POST['departuredate'];
$departure_time=$_POST['departuretime'];
$arrival_time=$_POST['arrivaltime'];
$flight_name=$_POST['flightname'];
$price=$_POST['price'];

if(isset($_POST['save'])){
    $update = "UPDATE flights SET departure='$departure',arrival='$arrival',departuredate='$departure_date',departuretime='$departure_time',flightname='$flight_name',price='$price' WHERE flightno='$id'";
    $update_query=mysqli_query($conn,$update);
    if($update_query){
        echo"RECORDS MODIFIED SUCCESSFULLY";
        header('Location:admin.php');
    }else{
        echo"RECORDS COULDNT BE MODIFIED";
    }
}
?>
</body>
</html>

