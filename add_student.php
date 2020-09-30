<?php 
	// Get the values from form
	$firstName = $_POST["first_name"];
	$lastName = $_POST["last_name"];
	$address = $_POST["address"];
	$age = $_POST["age"];


	// Prepare variables for db connection
	$serverName = "localhost";
	$userName = "root";
	$password = "";
	$dbName = "admin";

	// Create connection
	$conn = new mysqli($serverName,$userName,$password,$dbName);

	// Check connection
	if($conn->connect_error){
		die("Connection failed".$conn->connect_error);
	}

	// Prepare and bind statement
	$stmt = $conn->prepare("INSERT INTO students (firstname,lastname,address,age) VALUES (?,?,?,?)");
	$stmt->bind_param("sssi", $firstName, $lastName, $address, $age);
	$stmt->execute();

	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	header('Location:students.php');


 ?>