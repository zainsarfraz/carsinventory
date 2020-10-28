<?php 
include("../../dbConnection.php");


	$target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

for( $i=0 ; $i < count($_FILES["fileToUpload"]) ; $i++ ){

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"][$i]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"][$i] > 50000000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}



}




	$carname = mysqli_real_escape_string($conn, $_REQUEST['carname']);
	$company = mysqli_real_escape_string($conn, $_REQUEST['company']);
	$year = mysqli_real_escape_string($conn, $_REQUEST['year']);
	$color = mysqli_real_escape_string($conn, $_REQUEST['color']);
	$engine = mysqli_real_escape_string($conn, $_REQUEST['engine']);
	$chassis = mysqli_real_escape_string($conn, $_REQUEST['chassis']);
	$purchasefrom = mysqli_real_escape_string($conn, $_REQUEST['pfrom']);
		$purchasedate = mysqli_real_escape_string($conn, $_REQUEST['pdate']);
		$purchaseprice = mysqli_real_escape_string($conn, $_REQUEST['pprice']);
$comments = mysqli_real_escape_string($conn, $_REQUEST['comments']);
	
	$purchaseFromID;
		
		if($purchasefrom!="Null")
		{
			$sql = "SELECT id FROM person where name='$purchasefrom'";
                  if($result = mysqli_query($conn, $sql)){
                  if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $purchaseFromID = $row["id"];
		}}}
		else{
			$purchaseFromID = Null;
		}
		


	$is_sold = mysqli_real_escape_string($conn, $_REQUEST['soldselect']);
	if ($is_sold == "Yes")
	{
		
		$soldto = mysqli_real_escape_string($conn, $_REQUEST['sto']);
		$solddate = mysqli_real_escape_string($conn, $_REQUEST['sdate']);
		$soldprice = mysqli_real_escape_string($conn, $_REQUEST['sprice']);

		


		echo $soldto;
         $sql = "SELECT id FROM person where name = '$soldto'";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
         $row = mysqli_fetch_assoc($result);
         $soldToId = $row["id"];
		}


		$sql1 = "INSERT INTO car (name, company, year,color,engine_no,chassis_no,sold,purchased_from,purchased_date,purchased_price,sold_to,sold_date,sold_price,comments) VALUES ('$carname', '$company', '$year','$color','$engine','$chassis',1,'$purchaseFromID','$purchasedate','$purchaseprice','$soldToId','$solddate','$soldprice','$comments');";

		if($purchaseFromID == Null)
		{
			$sql1 = "INSERT INTO car (name, company, year,color,engine_no,chassis_no,sold,sold_to,sold_date,sold_price,comments) VALUES ('$carname', '$company', '$year','$color','$engine','$chassis',1,'$soldToId','$solddate','$soldprice','$comments');";
		}
		
		if(mysqli_query($conn, $sql1)){
		    echo "item added successfully.";
		   
		    $sql = "SELECT id FROM car order by id desc limit 1";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $row = mysqli_fetch_assoc($result);
                    	$car_id = $row["id"];
                    	
                    		
                    		for( $i=0 ; $i < count($_FILES["fileToUpload"]["name"]) ; $i++ ){
		    	
		    					//$name1 = $_FILES["fileToUpload"]["tmp_name"][$i];
		    					
								$name = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i]));
								$name = "uploads/" . $name;
		    					$sql = "INSERT into images (image_path,car_id)VALUES('$name','$car_id')";
				if (mysqli_query($conn, $sql)) {
				  echo "New record created successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
								
			}
		   
		   header('location:data.php');

			} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			}


		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	}
	else{

		$sql1 = "INSERT INTO car (name,company,year,color,engine_no,chassis_no,sold,purchased_from,purchased_date,purchased_price,comments) VALUES ('$carname','$company','$year','$color','$engine','$chassis',0,'$purchaseFromID','$purchasedate','$purchaseprice','$comments')";
		if($purchaseFromID == Null)
		{
			$sql1 = "INSERT INTO car (name,company,year,color,engine_no,chassis_no,sold,comments) VALUES ('$carname','$company','$year','$color','$engine','$chassis',0,'$comments')";;
		}
		
		
		
		if(mysqli_query($conn, $sql1)){
		    echo "item added successfully.";

		     $sql = "SELECT id FROM car order by id desc limit 1";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    $row = mysqli_fetch_assoc($result);
                    	$car_id = $row["id"];
                    	
                    		
                    		for( $i=0 ; $i < count($_FILES["fileToUpload"]["name"]) ; $i++ ){
		    	
		    					$name = htmlspecialchars( basename( $_FILES["fileToUpload"]["name"][$i]));
								$name = "uploads/" . $name;
		    					$sql = "INSERT into images (image_path,car_id)VALUES('$name','$car_id')";
		   	

				if (mysqli_query($conn, $sql)) {
				  echo "New record created successfully";
				} else {
				  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
								
			}


                     
                  } else {
                    echo "0 results";
                  }

		   
		    
		   
		  header('location:data.php');


		   

		} else{
		    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}
	}


	




?>
