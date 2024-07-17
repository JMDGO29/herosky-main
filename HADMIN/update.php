<?php
session_start();
	$connection = mysqli_connect("localhost", "root", "");
	$db = mysqli_select_db($connection, 'appointment');

  if(isset($_POST['updatedata']))
  {
    $useridUL = $_POST['Updated_list'];
    $bookid = $_POST['BOOK_ID'];
    $userid = $_POST['USER_ID'];
    $status = $_POST['STATUS'];
    $fullname = $_POST['FULLNAME'];
    $address = $_POST['ADDRESS'];
    $number = $_POST['NUMBER'];
    $email = $_POST['EMAIL'];
    $services = $_POST['SERVICES'];
    $petname = $_POST['PETNAME'];
    $breed = $_POST['BREED'];
    $birthdate = $_POST['BIRTHDATE'];
    $age = $_POST['AGE'];
    $species = $_POST['SPECIES'];
    $gender = $_POST['GENDER'];
    $genitals = $_POST['GENITALS'];
    $date = $_POST['DATE'];
    // var_dump( $_SESSION["USER_ID"]);
    $query = "UPDATE book
              SET STATUS='$status', 
                  FULLNAME='$fullname',
                  ADDRESS='$address',
                  NUMBER='$number',
                  EMAIL='$email',
                  SERVICES='$services',
                  PETNAME='$petname',
                  BREED='$breed',
                  BIRTHDATE='$birthdate',
                  AGE='$age',
                  SPECIES='$species',
                  GENDER='$gender',
                  GENITALS='$genitals',
                  DATE='$date'
              WHERE USER_ID= '$userid'";
              
    $query_run = mysqli_query($connection, $query);
    
    echo header("Location:appointment.php");
  }
?>