<?php

include("../../dbConnection.php");

$car_id = $_GET['id'];



		$id_of_car = $_GET['id'];
		$sql = "SELECT image_id,image_path,car_id from images where car_id='$id_of_car'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		 //output data of each row
		  while($row = mysqli_fetch_array($result)) {
		  		
		  		//echo "<img src='data:image/jpeg;base64,'".base64_encode($row["image_blob"])." width='100%' height='300px'/>";

		  		unlink($row["image_path"]);

		  }
			
		}



$sql = "DELETE FROM images WHERE car_id='$car_id'";

if (mysqli_query($conn, $sql)) {
  echo "images deleted successfully";

  $sql1 = "DELETE FROM car WHERE id='$car_id'";
  if(mysqli_query($conn,$sql1))
  {
  	echo "recoord deleted";
  }



  header('location:data.php');

} else {
  echo "Error deleting record: " . mysqli_error($conn);
}




?>