


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
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

    <?php
    include("../../dbConnection.php");
    include("loginSession.php");
    ?>

</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:100px;">
            <div class="col-md-12">
                <h1>Cars Inventory</h1>
            </div>
        </div>
         <div class="row " >
               <div class="col-md-4"></div>
                <div class="col-md-4  text-center">
                           
                            <div class="panel-body">
                                <form role="form" action="" method="post">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"  ></i></span>
                                            <input type="text" name="user" class="form-control" placeholder="Your Username " required />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="pass" class="form-control"  placeholder="Your Password"  required />
                                        </div>
                                   

                                         <input type="submit" name="submit" class="btn btn-primary" value="login">





                                    <hr />
                                  
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
