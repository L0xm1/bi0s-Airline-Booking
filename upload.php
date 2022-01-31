<!DOCTYPE html>
<html>
<head>
  <h1 style="color:white;">Confirm Booking</h1>
  <h2 style="color:white;">Passenger Details</h2>
  <link rel="stylesheet" type="text/css" href="style.css">
<body>
  <!-- since we are uploading files we use the enctype="multipart/form-data -->
  <form enctype="multipart/form-data" action="final.php" method="POST">
  <p>
    <label style="color:white;" ><b>Full Name</b></label><br>
      <input name="name" type="text" required>
      <br>
      <br>
      <label style="color:white;" ><b>Date Of Birth</b></label><br>
      <input name="age" type="date" required>
      <br>
      <br>
      <label style="color:white;" ><b>Email ID </b></label><br>
      <input type="email" name="email" required>
      <br>
      <br>
      <label style="color:white;" ><b>Phone Number </b></label><br>
      <input type="mobile number" name="phnumber" required>
      <br>
      <br>
      <label style="color:white;" ><b>Gender </b></label><br>
      <input type="gender" name="gender" required>
      <br>
      <br>
      <label style="color:white;" ><b>Please upload proof of identity [Passport or Aadhar Card in pdf/jpeg format]</b></label><br>
      <br>
      <input type="file" name="file_uploaded"></input><br />
      <input type="submit" value="Upload" name="upload"> </input>
      <br>
      <br>
      <input type="submit" name="submit" value="SUBMIT ">
</p>
    </form>
</body>
</html>
<?PHP
session_start();
if($_SESSION['access']!="YES"){
  header('Location:login.php');
}else{
  echo session_id();
  //$_FILES is a predefined variable that contains the information about the file uploaded 
  $file_name = $_FILES['file_uploaded']['name'];// name of the file uploaded
  $file_type = $_FILES['file_uploaded']['type'];//type of the file uploaded
  $file_size = $_FILES['file_uploaded']['size'];//size of the file uploaded
  $file_tmp = $_FILES['file_uploaded']['tmp_name'];//the temporarty location into which the file is stored
  
  //$_SERVER['DOCUMENT_ROOT'] returns the current directory in which this file is executing..we are concatening it with the path to our folder to store files
  $path = $_SERVER['DOCUMENT_ROOT']."/Airline/flight/images/" . basename( $_FILES['file_uploaded']['name']); // $path variable specifies the path to te folder to which we have to upload the files
  if(isset($_POST['submit'])){
    if(!empty($_FILES['file_uploaded'])){
      if($file_size < 10485760){
        if($file_type == 'image/jpeg'){
          //move_uploaded_file($file_tmp,$path) moves the file from the temporary location to the the folder which we defined in the $path
          if(move_uploaded_file($file_tmp, $path)) {
            echo "The file ".  basename( $_FILES['file_uploaded']['name'])." has been uploaded";
          } else{
            echo "There was an error uploading the file, please try again!";
          }
        }else{
          echo"Please select Image File";
        }
      }else{
        echo"Please select a file less than 10MB";}
      }
    }
}
?>