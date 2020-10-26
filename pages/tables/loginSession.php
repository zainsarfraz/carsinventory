<?php
   

   session_start();
   

   if(isset($_REQUEST["submit"]))
   {
      $username = $_REQUEST["user"];
      $password = $_REQUEST["pass"];

      if ($username == "admin" && $password == "admin"){
          $_SESSION["userId"]=$username;
          header('location:data.php');
      }
      else{
         echo "<script type='text/javascript'>";
         echo "window.alert('Wrong email and password')";
         echo "</script>";
      }
}

?>