<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointment";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

	$status = 'Pending';
    $fname = $_POST['FULLNAME'];
	$address = $_POST['ADDRESS'];
	$number = $_POST['NUMBER'];
	$email = $_POST['EMAIL'];
	$services = $_POST['SERVICES'];
	$pname = $_POST['PETNAME'];
	$breed = $_POST['BREED'];
	$birthdate = $_POST['BIRTHDATE'];
	$age = $_POST['AGE'];
	$species = $_POST['SPECIES'];
	$gender = $_POST['GENDER'];
	$genitals = $_POST['GENITALS'];
	$date = $_POST['DATE'];
	$user_id = $_SESSION['USER_ID'];
	$count = 3;


	$reg = "SELECT count(DATE) as count FROM book where DATE = '$date'";
	$result = $conn->query($reg);
	
	if ($result->num_rows > 0)
	 {
	  // output data of each row
		while($row = $result->fetch_assoc())
		
	   {
		if($row['count'] >= $count)
		{		
			$_SESSION[$status] = $row[$status];	
			header("location: wala.php");
		}
		else
		{
			$reg = "INSERT INTO book (USER_ID, STATUS, FULLNAME, ADDRESS, NUMBER, EMAIL, SERVICES, PETNAME, BREED, BIRTHDATE, AGE, SPECIES, GENDER, GENITALS, DATE)
			VALUES ('$user_id','$status', '$fname', '$address', '$number', '$email', '$services', '$pname', '$breed', '$birthdate' , '$age', '$species', 	'$gender', '$genitals', '$date')";
			

			
			if ($conn->query($reg) === TRUE)
			  {
				echo '
					<script>
					alert("Your appointment is successfully booked. Thank you!")
					location.href = "index.php"
					</script> ';	  
				} 
			else 
			  {
				echo "Error: " . $reg . "<br>" . $conn->error;
			  }
		}
	   }
	}


?>