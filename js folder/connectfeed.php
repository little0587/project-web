<?php
	$Name = $_POST['Name'];
	$email = $_POST['email'];
	$fedback = $_POST['fedback'];

	// Database connection
	$conn = new mysqli('localhost','root','','cofeex');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into feedback(Name,email,fedback) values(?, ?, ?)");
		$stmt->bind_param("sss", $Name,$email, $fedback);
		$execval = $stmt->execute();
		echo $execval;
		echo " thanks for feedback...";
		$stmt->close();
		$conn->close();
	}
?>