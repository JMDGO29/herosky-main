<?php
	
	session_start();


	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "appointment";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	$Username = $_POST['USERNAME'];
	$Password = $_POST['PASSWORD'];

	
	
	$sql = "SELECT * from user where USERNAME ='$Username' and PASSWORD ='$Password'";
	$result = $conn->query($sql);

	// for login
	if ($result->num_rows > 0)
	 {
	  // output data of each row
		while($row = $result->fetch_assoc())
	   {
		$_SESSION["USER_ID"] = $row['USER_ID'];
		$_SESSION["FIRSTNAME"] = $row['FIRSTNAME'];
	   	header("location: index.php");
	  }
	}
    else {
	  	
	  	header("location: index.php");	  	
	}	