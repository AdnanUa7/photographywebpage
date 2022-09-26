<?php 
  session_start();
  if(isset($_SESSION['sid'])){
    
  }
  else{
    echo "<script>alert('First you need to be login !!!')</script>";
    echo "<script>window.location = '../index.php'</script>";
  }
 ?>