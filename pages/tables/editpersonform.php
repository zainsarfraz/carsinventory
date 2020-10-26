<?php

include("../../dbConnection.php");
session_start();
    if($_SESSION["userId"]==false)
    {

      header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Person</title>

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

<script type="text/javascript">

 
        // function extendForm() { 
          
        //     // document.getElementById("temp").innerHTML +=  x;
        //     $('#temp').append('<input type='button'/>'); 
        // } 
       
  function myFunction() {

  var x = document.getElementById("temp");
  if(document.getElementById("mySelect").selectedIndex==0)
  {
    x.style.display="none";
  }
  if(document.getElementById("mySelect").selectedIndex == 2)
  {
    x.style.display = "block";
  }
  if(document.getElementById("mySelect").selectedIndex == 1)
  {
    x.style.display = "none";
  }

  
}
    
</script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    

    

  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  
<div class="card card-primary" style="">
              <div class="card-header">
                <h3 class="card-title">Edit Details</h3>

              </div>

<a href="persondata.php" class="btn btn-primary">Go Back</a>              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" <?php echo "action='updateperson.php?id=".$_GET["id"]."'" ?> >
                <div class="card-body">
                  <?php  

                    $id_of_person = $_GET['id'];
 

  $sql = "SELECT id, name,phone,type FROM person where id = '$id_of_person'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      
        echo " <form method='post' action='updateperson.php' >
                <div class='card-body'>
                  <div class='form-group'>
                    <label for='carName'>Name</label>
                    <input type='text' class='form-control' id='carName' placeholder='Enter Name' required='' name='name' value='".$row["name"]."'>
                  </div>
                  <div class='form-group'>
                    <label for='carCompany'>Phone</label>
                    <input type='text' class='form-control' id='carCompany' placeholder='Enter Phone no' required='' name='phone' value='".$row["phone"]."'>
                  </div>
                  

                  <div class='form-group'>
                    <select name='type'>
                      <option>sold to</option>
                      <option>purchase from</option>
                    </select>

                  </div>
                ";



  }}
      


                  ?>
                  
                  
                  
                  
                  


                 <!--  <div class="form-group" id="img">
                    <label for="exampleInputFile">Image Files input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" multiple data-show-upload="true">
                        <label class="custom-file-label" for="exampleInputFile">Choose files</label>

                      </div>

                    </div>
                  </div> -->
                  
                  
                  
                


                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
              </form>
            </div>




    <!-- Main content -->
   
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>