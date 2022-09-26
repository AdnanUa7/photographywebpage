<?php
    include('include/header.php');
?>

<div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                <div class="pageheader hidden-xs" style="margin: 0px;">
                  <h3><i class="fa fa-user"></i> Profile </h3>
                    <div class="breadcrumb-wrapper">
                      <span class="label">You are here:</span>
                         <ol class="breadcrumb">
                            <li> <a href="#"> Home </a> </li>
                            <li class="active"> Profile </li>
                         </ol>
                    </div>
                </div>
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="pageheader" style="margin-top:-100px;padding-bottom: 10px;">
                        <img src="../signup/<?php echo $img?>" alt="" style="width: 80px;height: 80px;border-radius: 50%;">
                        <br>
                        <h3 style="padding-top: 10px;"><?php echo $fname." ".$lname?></h3>
                        <p style="color: #000;">Role: User</p>
                        
                    </div>
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <!--End page title-->
                    <!--Page content-->
                    <!--===================================================-->

                    <div id="page-content" style="margin-top: -10px;">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <!-- Panel heading -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><i class="fa fa-user"></i> Profile Information</h3>
                                    </div>
                                    <!-- Panel body -->
                                    
                                        <div class="panel-body" style="margin-right: -120px;">
                                            <div style="padding-bottom: 10px;">
                                                <div class="col-sm-1">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="col-sm-2">
                                                    <b>First Name</b>
                                                </div>
                                                <div class="col-sm-5">
                                                   <b><?php echo $fname?></b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding-bottom: 10px;">
                                                <div class="col-sm-1">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                                <div class="col-sm-2">
                                                    <b>Last Name</b>
                                                </div>
                                                <div class="col-sm-5">
                                                   <b><?php echo $lname?></b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding-bottom: 10px;">
                                                <div class="col-sm-1">
                                                    <i class="fa fa-venus-mars" style="font-weight: bold"></i>
                                                </div>
                                                <div class="col-sm-2">
                                                    <b>Gender</b>
                                                </div>
                                                <div class="col-sm-5">
                                                   <b><?php echo $row['gender']?></b>
                                                </div>
                                            </div>
                                            <hr>
                                            <div style="padding-bottom: 10px;">
                                                <div class="col-sm-1">
                                                    <i class="fa fa-envelope" style="font-weight: bold"></i>
                                                </div>
                                                <div class="col-sm-2">
                                                    <b>Email</b>
                                                </div>
                                                <div class="col-sm-5">
                                                   <b><?php echo $row['email']?></b>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>

                                </div>
                               
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </div>
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                <?php include('include/aside.php')?>
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form validation [ SAMPLE ]-->
        <script src="js/demo/form-validation.js"></script>
    </body>
</html>
<?php 
if (isset($_POST['update'])) {

    $folder = "pictures/";
    $filename = $_FILES['img']["name"];
    $unique = uniqid().$filename;
    $temname = $_FILES['img']["tmp_name"];
    $size = $_FILES['img']["size"];
    
    $target = $folder.basename($unique);
    $filetype = strtolower(pathinfo($target,PATHINFO_EXTENSION));
    if ($filetype !="jpg" && $filetype !="png" && $filetype !="jpeg") {
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is not an image'; </script>";
        exit();
    }
    else if($size > 2097152){
        echo "<script>document.getElementById('imgerror').innerHTML = '** File is larger than 2MP';</script>";
        exit();
    }
    else {
      if(isset($_SESSION['sid'])){
        $id = $_SESSION['sid'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $gender = $_POST['gender'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($password !=$cpassword) {
            echo "<script>document.getElementById('passerror').innerHTML = '** Passwords are not watching !!!'; </script>";
            exit();
        }
        $data = mysqli_query($sql_con,"SELECT *from users where id='$id'");
        $row = mysqli_fetch_array($data);
        $img = $row['img'];
        if (file_exists("../signup/".$img))
        {
          unlink("../signup/".$img);   
        }
        move_uploaded_file($temname,"../signup/".$target);
        mysqli_query($sql_con,"UPDATE users set fname = '$fname',lname = '$lname',gender = '$gender',password = '$cpassword',img = '$target' where id = '$id'");
        echo "<script>alert('Account information updated successfully')</script>";
        session_start();
        if (isset($_SESSION['sid'])) {
            unset($_SESSION['sid']);
            echo "<script>window.location = '../index.php'</script>";
        }
      }
      else{
        echo "<script>alert('Go back and try again something wrong')</script>";
        echo "<script>window.location = 'dashboard.php'</script>";
      }
}
}
 ?>