
<?php

include("../../dbConnection.php");

$person_id = $_GET['id'];

$sql1 = "delete from images where car_id in (
SELECT id from car WHERE car.purchased_from = $person_id or car.sold_to= $person_id 
)";
if(mysqli_query($conn,$sql1)){
	
}
$sql2 = "DELETE FROM car where purchased_from='$person_id' or sold_to='$person_id'";
mysqli_query($conn,$sql2);

		$sql3 = "DELETE FROM person WHERE id='$person_id'";

if (mysqli_query($conn, $sql3)) {
  echo "data deleted successfully";
  header('location:persondata.php');
}


		
?>