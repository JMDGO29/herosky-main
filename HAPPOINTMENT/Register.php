<?php

	$mysqli = new mysqli("localhost", "root", "", "appointment");
	
	if($mysqli === false){
	die("ERROR: Could not connect. " . $mysqli->connect_error);
	}
	$Userlevel = "User";
    $fname = $_POST['FIRSTNAME'];
	$lname = $_POST['LASTNAME'];
    $username = $_POST['USERNAME'];
	$password = $_POST['PASSWORD'];
	
	
	$message = "Username already taken! ugh";


	$s = "SELECT * FROM user where USERNAME = '$username' and PASSWORD = '$password'";

	$result = $mysqli->query($s);
	
	$num = mysqli_num_rows($result);
	
	if($result->num_rows > 0)
	{	
		while($row = $result->fetch_assoc()) {
			echo '
			<script>
			alert("Sorry! The username is already registered.")
			location.href = "index.php"
			</script> ';
	}
	}
	
	else {
		$reg = "INSERT INTO user (USER_LEVEL, FIRSTNAME, LASTNAME, USERNAME, PASSWORD)
	    VALUES ('$Userlevel','$fname', '$lname', '$username', '$password' )";
	    mysqli_query($mysqli, $reg);
		echo '
		<script>
		alert("Account Successfully Registered. Thank you!")
		location.href = "index.php"
		</script> ';
	    
	}

?>