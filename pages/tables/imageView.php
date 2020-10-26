<?php
    include("../../dbConnection.php");
    if(isset($_GET['image_id'])) {
        $sql = "SELECT image_blob,image_prop FROM images WHERE image_id=" . $_GET['image_id'];
		$result = mysqli_query($conn, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($conn));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["image_prop"]);
        echo base64_encode($row["image_blob"]);
	}
	mysqli_close($conn);
?>


