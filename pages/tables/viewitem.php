<?php 
include("../../dbConnection.php");
session_start();
    if($_SESSION["userId"]==false)
    {

      header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Car # <?php echo $_GET['id'];?></title>


	<!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">

</head>
<body>
<br><br>

	<a href="data.php" class="btn btn-primary">Go Back</a>
<div class="container">
<div class="row">


<?php 
	$id_of_car = $_GET['id'];
	$pfrom=$pdate=$pprice=$pphone=$sto=$sdate=$sprice="Null";

	$sql = "select car.name,car.company,car.year,car.color,car.engine_no,car.chassis_no,car.sold,car.comments from car where car.id = '$id_of_car'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
	  	
	  	if($row["sold"] == "1")
	  		$row["sold"] = "Yes";
	  	else
	  		$row["sold"] = "No";
	    
	  		echo "<div class='col-md-2'>
	<b><p>Car Name</p></b><p>". $row["name"]."</p>
	<b><p>Car Company</p></b><p>". $row["company"]."</p>
	<b><p>Car Year</p></b><p>". $row["year"]. "</p>
	<b><p>Car Color</p></b><p>". $row["color"]."</p>
	<b><p>Car Engine No</p></b><p>".$row["engine_no"]."</p>
	<b><p>Car Chassis No</p></b><p>".$row["chassis_no"]."</p>
  <b><p>Additional Comments</p></b><p>".$row["comments"]."</p>
	<b><p>Car Sold</p></b><p>". $row["sold"]  ."</p>
	</div>
	";
	

	  }
	}

?>

<?php
$id_of_car = $_GET['id'];
	$pfrom=$pdate=$pprice=$pphone=$sto=$sdate=$sprice="Null";

	$sql = "select person.name,car.purchased_date,car.purchased_price,person.phone,car.comments from car,person where car.id = '$id_of_car' and person.id=car.purchased_from";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
echo "<div class='col-md-3'>
	<b><p>Car Purchased From</p></b><p>". $row["name"]."</p>
	<b><p>Car Purchased Date</p></b><p>". $row["purchased_date"]."</p>
	<b><p>Car Purchase Price</p></b><p>".$row["purchased_price"]. "</p>
	<b><p>Car Purchase Phone</p></b><p>". $row["phone"]."</p>
		";
}
}
else
{echo "<div class='col-md-3'>
	<b><p>Car Purchased From</p></b><p>Null</p>
	<b><p>Car Purchased Date</p></b><p>Null</p>
	<b><p>Car Purchase Price</p></b><p>Null</p>
	<b><p>Car Purchase Phone</p></b><p>Null</p>";
}
?>

<?php
$id_of_car = $_GET['id'];
	$pfrom=$pdate=$pprice=$pphone=$sto=$sdate=$sprice="Null";

	$sql = "select person.name,car.sold_date,car.sold_price,person.phone from car,person where car.id = '$id_of_car' and person.id=car.sold_to";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
	  // output data of each row
	  while($row = mysqli_fetch_assoc($result)) {
echo "<b><p>Car Sold to</p></b><p>".$row["name"]."</p>
	<b><p>Car Sold Date</p></b><p>".$row["sold_date"]."</p>
	<b><p>Car Sold Price</p></b><p>". $row["sold_price"]  ."</p>
	<b><p>Phone no</p></b><p>". $row["phone"]  ."</p>
	</div>";
}}
else{

	echo "<b><p>Car Sold to</p></b><p>Null</p>
	<b><p>Car Sold Date</p></b><p>Null</p>
	<b><p>Car Sold Price</p></b><p>Null</p>
	<b><p>Phone no</p></b><p>Null</p>
	</div>";
}

?>


<div class="col-md-6" style="">
	


<?php
		$id_of_car = $_GET['id'];
		$sql = "SELECT image_id,image_path,car_id from images where car_id='$id_of_car'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		 //output data of each row
		  while($row = mysqli_fetch_array($result)) {
		  		
		  		//echo "<img src='data:image/jpeg;base64,'".base64_encode($row["image_blob"])." width='100%' height='300px'/>";

		  		echo "<img src='". $row["image_path"] ."' width='50%' height='200px' style='padding:20px;'/>";

		  }
			
		}

	?> 






</div>


</div>	
</div>

</body>
</html>
