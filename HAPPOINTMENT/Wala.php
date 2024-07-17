<?php

	$mysqli = new mysqli("localhost", "root", "", "appointment");
	
	if($mysqli === false){
	die("ERROR: Could not connect. " . $mysqli->connect_error);
	}

	echo '
	<script>
	alert("This day is already fully booked, Please select another day! Thank you!")
	location.href = "index.php"
	</script> '
    // echo "<pre>";
    // print_r($_POST ['FULLNAME']);
    // echo "</pre>";

?>