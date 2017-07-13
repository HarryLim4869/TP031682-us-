<?php

	$conID = $_POST['conID'];
	
	//Connect database
	$conn = mysqli_connect("localhost", "root", "");
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
			
	mysqli_select_db($conn, 'CMS');
	
	$sql2 = "DELETE FROM container WHERE ContainerID = '$conID'";
	
	if ($sql2) {
		mysqli_query($conn, $sql2);	
	}
	
	echo json_encode(mysqli_error($conn));
	$conn->close();

?>