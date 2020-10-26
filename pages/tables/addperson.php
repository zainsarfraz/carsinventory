<?php

include("../../dbConnection.php");

	$name = mysqli_real_escape_string($conn, $_REQUEST['name']);
	$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
	$type = mysqli_real_escape_string($conn, $_REQUEST['type']);


	$sql1 = "INSERT INTO person (name, phone, type) VALUES ('$name', '$phone', '$type');";
		
		if(mysqli_query($conn, $sql1)){
		    echo "item added successfully.";
		    header('location:persondata.php');
		}
		    else{
		    	echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		    }



?>