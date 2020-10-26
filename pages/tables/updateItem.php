<?php


include("../../dbConnection.php");
$car_id = $_GET["id"];



	$carname = mysqli_real_escape_string($conn, $_REQUEST['carname']);
	$company = mysqli_real_escape_string($conn, $_REQUEST['company']);
	$year = mysqli_real_escape_string($conn, $_REQUEST['year']);
	$color = mysqli_real_escape_string($conn, $_REQUEST['color']);
	$engine = mysqli_real_escape_string($conn, $_REQUEST['engine']);
	$chassis = mysqli_real_escape_string($conn, $_REQUEST['chassis']);
	
	
	$is_sold = mysqli_real_escape_string($conn, $_REQUEST['soldselect']);
	if ($is_sold == "Yes")
	{
		$purchasefrom = mysqli_real_escape_string($conn, $_REQUEST['pfrom']);
		$purchasedate = mysqli_real_escape_string($conn, $_REQUEST['pdate']);
		$purchaseprice = mysqli_real_escape_string($conn, $_REQUEST['pprice']);
		$soldto = mysqli_real_escape_string($conn, $_REQUEST['sto']);
		$solddate = mysqli_real_escape_string($conn, $_REQUEST['sdate']);
		$soldprice = mysqli_real_escape_string($conn, $_REQUEST['sprice']);

		$sql2 = "select id from person where name='$purchasefrom'";
                        $result = mysqli_query($conn, $sql2);
                         if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      $purchasefrom = $row["id"];
                    }
                }
        $sql3 = "select id from person where name='$soldto'";
                        $result = mysqli_query($conn, $sql3);
                         if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      $soldto = $row["id"];
                    }
                }


		$sql = "UPDATE car SET name='$carname',company='$company',year='$year',color='$color',engine_no='$engine',chassis_no='$chassis',sold=1,purchased_from='$purchasefrom',purchased_date='$purchasedate',purchased_price='$purchaseprice',sold_to='$soldto',sold_date='$solddate',sold_price='$soldprice' WHERE id='$car_id'";

		if (mysqli_query($conn, $sql)) {
		  echo "Record updated successfully";
		  header('location:data.php');
		} else {
		  echo "Error updating record: " . mysqli_error($conn);
		}

	}
	else{
		$purchasefrom=$purchasedate=$purchaseprice=$soldto=$solddate=$soldprice = "Null";



		$sql = "UPDATE car SET name='$carname',company='$company',year='$year',color='$color',engine_no='$engine',chassis_no='$chassis',sold=0,purchased_from=NULL,purchased_date=NULL,purchased_price=NULL,sold_to=NULL,sold_date=NULL,sold_price=NULL WHERE id='$car_id'";

		if (mysqli_query($conn, $sql)) {
		  echo "Record updated successfully";
		  header('location:data.php');
		} else {
		  echo "Error updating record: " . mysqli_error($conn);
		}





	}

?>