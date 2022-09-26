<?php 
  session_start();
  if(isset($_SESSION['sid'])){
    
  }
  else{
    header('location: ../login/login.php');
  }
 ?>