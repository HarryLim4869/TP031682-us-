<?php

	$conID = $_POST['conID'];
	
	//Connect database
	$conn = mysqli_connect("localhost", "root", "");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
			
	mysqli_select_db($conn, 'CMS');
	
	$sql = "UPDATE container
			SET Status = 'Released'
			WHERE ContainerID = '$conID'";
		
	if ($sql) {
		mysqli_query($conn, $sql);
			
	}
		
	echo json_encode(mysqli_error($conn));
	$conn->close();

?>