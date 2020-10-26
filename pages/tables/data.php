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
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    

    

  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- saifdfash -->

  <?php
    include("../../dbConnection.php");
    session_start();
    if($_SESSION["userId"]==false)
    {

      header('location:login.php');
    }


  ?>
  
  <script>
function viewItem(id) {
  window.location.href = 'viewitem.php?id=' + id;
}
function editItem(id) {
  window.location.href = 'edititemform.php?id=' + id;
}
function deleteItem(id) {
   window.location.href = 'deleteitem.php?id=' + id;
}
function addItem() {
   window.location.href = 'additemform.php';
}
</script>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Details of Cars Data</h3>
              </div>
              <div class="card-header">
                <input type="button" name="Add New Car" value="Add New Car" class="btn btn-primary" onclick="addItem()">
                
                <a href="persondata.php" class="btn btn-primary" >Persons</a>
                <a href="logout.php" class="btn btn-danger" >Logout</a>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Car Name</th>
                    <th>Car Company</th>
                    <th>Year of Manufacture(s)</th>
                    <th>Car Colour</th>
                    <th>Engine No</th>
                    <th>Chasis No</th>
                    <th>Sold</th>
                    <th scope="col"></th>
                  </tr>
                  </thead>
                  <tbody>

                  <?php

                  $sql = "SELECT id,name,company,year,color,engine_no,chassis_no,sold FROM car";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                      if ($row["sold"] == 1)
                        $row["sold"] = "Yes";
                      else
                        $row["sold"] = "No";

                      echo "<tr>
                    <td>". $row["name"] ."</td>
                    <td>". $row["company"]."</td>
                    <td>". $row["year"]."</td>
                    <td>". $row["color"]."</td>
                    <td>". $row["engine_no"]."</td>
                    <td>". $row["chassis_no"]."</td>
                    <td>". $row["sold"]."</td>
                    <td>
                                               
                                            <ul class='list-inline m-0'>
                                                <li class='list-inline-item'>
                                                    <button class='btn btn-primary btn-sm rounded-0' type='button' data-toggle='' onclick='viewItem(".$row["id"].")' data-placement='top' title='Add'><i class='fa fa-table'></i></button>

                                                </li>
                                                <li class='list-inline-item'>
                                                    <button class='btn btn-success btn-sm rounded-0' type='button' data-toggle='tooltip' onclick='editItem(".$row["id"].")'data-placement='top' title='Edit'><i class='fa fa-edit'></i></button>
                                                </li>
                                                <li class='list-inline-item'>
                                                    <button class='btn btn-danger btn-sm rounded-0' type='button' data-toggle='tooltip' onclick='deleteItem(".$row["id"].")'data-placement='top' title='Delete'><i class='fa fa-trash'></i></button>
                                                </li>
                                            </ul>
                      </td>
                  </tr>";


                    }
                  } else {
                    echo "0 results";
                  }

                  ?>

                  

                  
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Car Name</th>
                    <th>Car Company</th>
                    <th>Year of Manufacture(s)</th>
                    <th>Car Colour</th>
                    <th>Engine No</th>
                    <th>Chasis No</th>
                    <th>Sold</th>
                    <th scope="col"></th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

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
