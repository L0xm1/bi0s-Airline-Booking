<?php
include"connection.php";
$id=$_GET['id'];
$delete="DELETE FROM flights WHERE flightno='$id'";
$delete_query =mysqli_query($conn,$delete);
if($delete_query){
    echo"RECORDS HAS BEEN DELETED SUCESSFULLY";
    header('Location:admin.php');
}else{
    echo"RECORDS COULDNT BE DELETED";
}
?>