<?php
	
	$conn = mysqli_connect("localhost", "root", "");
		
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
		
	mysqli_select_db($conn, 'CMS');
	
	$sql = "SELECT * FROM container";
	$result = '';
	
	if ($sql) {
		$result = mysqli_query($conn, $sql);	
	}
	
	$myjsons = array();
	while($row = mysqli_fetch_assoc($result)){ 
		$myjsons[] = array(
			'conID' => $row['ContainerID'],
			'conInDate' => $row['ContainerInDate'],
			'conOutDate' => $row['ContainerOutDate'],
			'status' => $row['Status'],
			'owner' => $row['Owner'],
		);
    }
	
	echo json_encode($myjsons);
	$conn->close();
	
?>