<?php

include("../../dbConnection.php");


	$person_id = $_GET["id"];
	echo $person_id;
    $name = mysqli_real_escape_string($conn, $_REQUEST['name']);
	$phone = mysqli_real_escape_string($conn, $_REQUEST['phone']);
	$type = mysqli_real_escape_string($conn, $_REQUEST['type']);


	$sql = "UPDATE person SET name='$name',phone='$phone',type='$type' WHERE id='$person_id'";

		if (mysqli_query($conn, $sql)) {
		  echo "Record updated successfully";
		  header('location:persondata.php');
		} else {
		  echo "Error updating record: " . mysqli_error($conn);
		}


?>