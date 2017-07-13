<?php


	$conID = $_POST['conID'];
	$conInDate = $_POST['conInDate'];;
	$conOutDate = $_POST['conOutDate'];
	$conStatus = 'Waiting for Release';
	$conOwner = $_POST['conOwner'];
	
	$conn = mysqli_connect("localhost", "root", "");
		
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
		
	mysqli_select_db($conn, 'CMS');
	
	$sql = "INSERT INTO container (ContainerID, ContainerInDate, ContainerOutDate, Status, Owner)
			VALUES ('$conID', '$conInDate', '$conOutDate', '$conStatus', '$conOwner')";
	
	if ($sql) {
		mysqli_query($conn, $sql);
	} else {
		$status = "Failed";
	}

	echo json_encode(mysqli_error($conn));
	$conn->close();

?>