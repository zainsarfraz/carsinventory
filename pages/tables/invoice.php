<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Invoice <?php echo $_GET["id"]?></title>

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
<body class="hold-transition sidebar-mini" onload="temp()">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    

    

  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  <?php
    include("../../dbConnection.php");
    session_start();
    if($_SESSION["userId"]==false)
    {

      header('location:login.php');
    }


  ?>
  <script type="text/javascript">
    
    function removeme(id)
    {
      console.log(id);
      document.getElementById("myTable").deleteRow(id);
      temp();
    }
    function printpage()
    {
      var prtContent = document.getElementById("x");
      var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
      WinPrint.document.write(prtContent.innerHTML);
      WinPrint.document.close();
      WinPrint.focus();
      WinPrint.print();
      WinPrint.close();
    }

    //$(".price").text();
    function temp(){
    var t = document.getElementsByClassName('price');
    total = document.getElementById('totalprice');
    totaln = document.getElementById('totalpricen');
    var tp = 0;
    console.log(total.innerHTML);
    for (var i=0;i<t.length;i++)
    {
      tp += parseInt(t[i].innerHTML);
    }
    total.innerHTML = "<b>Total :</b> "+tp+" ¥";
    totaln.innerHTML = "<b>Net Total :</b> "+tp+" ¥";
  }

  </script>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Cars Sold to <?php
                  $personid = $_GET["id"];
                    $sql = "SELECT id,name,phone,type FROM person where id='$personid'";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                    echo $row["name"];
                  }}
                  ?></h3>
              </div>
              <div class="card-header">
                
                
                <a href="persondata.php" class="btn btn-primary" >back</a>
                <a href="logout.php" class="btn btn-danger" >Logout</a>
                <button  class="btn btn-success" onclick="printpage()">Generate Bill</button>

              </div>
              <!-- /.card-header -->

              <div id="x">
                <br>
                  <center><h3>Invoice</h3></center>
                <br>
                
                  <div class="col-md-4" style="margin-left: 10%">
                    <b>Date :   </b><?php 
                      echo date('d/M/Y');
                    ?><br>
                    
                    <br>
                    
                    <b>Client Name :   </b><?php 
                      $personid = $_GET["id"];
                      $sql = "SELECT name,phone from person where id = '$personid'";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_assoc($result);
                      echo $row["name"];
                    ?><br>
                    <b>Client Phone : </b><?php 
                    $personid = $_GET["id"];
                      $sql = "SELECT name,phone from person where id = '$personid'";
                      $result = mysqli_query($conn,$sql);
                      $row = mysqli_fetch_assoc($result);
                      echo $row["phone"];
                    ?>
                  </div>
                  
                  <br><br>
                
                
                <?php
                $personid = $_GET["id"];
                  $sql = "SELECT id,name,company,year,color,engine_no,chassis_no,sold_price,sold_date FROM car where sold_to='$personid'";
                  $result = mysqli_query($conn, $sql);

                  if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    echo "<table width='80%' align='center' id='myTable' border='1px' >
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Year</th>
                    <th>Color</th>
                    <th>Engine No</th>
                    <th>Chassis no</th>
                    <th>Sold date</th>
                    <th>Sold in</th>
                    <th></th>
                  </tr>
                  ";
                  $i=1;
                    while($row = mysqli_fetch_assoc($result)) {

                      echo "

                      <tr id='".$row["id"]."'>
                        <td>".$row["id"]."</td>
                        <td>".$row["name"]."</td>
                        <td>".$row["company"]."</td>
                        <td>".$row["year"]."</td>
                        <td>".$row["color"]."</td>
                        <td>".$row["engine_no"]."</td>
                        <td>".$row["chassis_no"]."</td>
                        <td>".$row["sold_date"]."</td>
                        <td class='price'>".$row["sold_price"]." ¥</td>
                        <td><input type='button' value='X' onclick='removeme(".$i.")'></td>
                      </tr>";
                      $i+=1;
                  }
                echo "<tr></tr></table>";
                }
                else
                {
                  echo "No Cars sold to this person.";
                }
                ?>
                  <br>
                  <br>
                  <div style="width: 80%;text-align: center; margin-left: 40%" align="center">
                    <p id="totalprice"><b>Total :</b> Null ¥</p>
                    <p ><b>Tax Rate :</b> 0 %</p>
                    <p id="totalpricen"><b>Net Total :</b> Null ¥</p>
                    
                  </div>
                  <br>
                  <h3 align="center">
                    Thank you for your business !
                  </h3>
                 <br> 
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
