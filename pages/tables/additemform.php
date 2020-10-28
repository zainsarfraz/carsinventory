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
  <title>Dashboard</title>

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
                <h3 class="card-title">Enter Details</h3>

              </div>

<a href="data.php" class="btn btn-primary">Go Back</a>              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="additem.php" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="carName">Car Name</label>
                    <input type="text" class="form-control" id="carName" placeholder="Enter Car Name" required="" name="carname">
                  </div>
                  <div class="form-group">
                    <label for="carCompany">Car Company</label>
                    <input type="text" class="form-control" id="carCompany" placeholder="Enter Car Company" required="" name="company">
                  </div>
                  <div class="form-group">
                    <label for="carYear">Car Year</label>
                    <input type="Year" class="form-control" id="carYear" placeholder="Enter Car Year" required="" name="year">
                  </div>
                  <div class="form-group">
                    <label for="carColor">Car Color</label>
                    <input type="text" class="form-control" id="carColor" placeholder="Enter Car Color" required="" name="color">
                  </div>
                  <div class="form-group">
                    <label for="engineNo">Car Engine No</label>
                    <input type="text" class="form-control" id="engineNo" placeholder="Enter Car Engine No" required="" name="engine">
                  </div>
                  <div class="form-group">
                    <label for="chassisNo">Car Chassis No</label>
                    <input type="text" class="form-control" id="chassisNo" placeholder="Enter Car Chassis No" required="" name="chassis">
                  </div>
                    <div class="form-group">
                    <label for="comments">Additional Comments</label>
                    <input type="text" class="form-control" id="comments" placeholder="Enter Comments about car" required="" name="comments">
                  </div>


                 <!--  <div class="form-group" id="img">
                    <label for="exampleInputFile">Image Files input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" multiple data-show-upload="true">
                        <label class="custom-file-label" for="exampleInputFile">Choose files</label>

                      </div>

                    </div>
                  </div> -->
                  <label for="files">Select files:</label><br>
                  <input type="file" id="files" name="fileToUpload[]" multiple required=""><br><br>
                  

                  <div class="form-group">
                    <label for="purchaseFrom">Car Purchased From</label>
                    <!-- <input type="text" class="form-control" id="purchaseFrom" placeholder="Enter Name" name="pfrom"> -->
                    <select class="form-control" id="purchaseFrom" name="pfrom">
                      <option>Null</option>
                       <?php
                        $sql = "select name from person where type='purchase from'";
                        $result = mysqli_query($conn, $sql);
                         if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<option>".$row["name"]."</option>";
                    }
                  }

                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="purchaseDate">Car Purchased on</label>
                    <input type="date" class="form-control" id="purchaseDate" placeholder="Enter Date" name="pdate">
                  </div>
                  <div class="form-group">
                    <label for="purchasePrice">Car Purchased Price</label>
                    <input type="number" class="form-control" id="purchasePrice" placeholder="Enter Price" name="pprice">
                  </div>
                 
                  <div class="form-group" >
                  <label>Is this car Sold</label>
                  <select class="form-control" id="mySelect" onchange="if (this.selectedIndex) myFunction();" name="soldselect">
                    <option>Select..</option>
                    <option>No</option>
                    <option>Yes</option>
                  </select>
                </div>

                <div id="temp" style="display: none">
                
                  <div class="form-group">
                    <label for="soldTo">Car Sold to</label>
                    <select class="form-control" id="soldTo" name="sto">
                      <option>Null</option>
                      <?php
                        $sql = "select name from person where type='sold to'";
                        $result = mysqli_query($conn, $sql);
                         if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      echo "<option>".$row["name"]."</option>";
                    }
                  }

                      ?>
                    </select> 

                  </div>
                  <div class="form-group">
                    <label for="soldDate">Car Sold on</label>
                    <input type="date" class="form-control" id="soldDate" placeholder="Enter Date" name="sdate">
                  </div>
                  
                  <div class="form-group">
                    <label for="soldPrice">Car Sold Price</label>
                    <input type="number" class="form-control" id="soldPrice" placeholder="Enter Price" name="sprice">
                  </div>


                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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




