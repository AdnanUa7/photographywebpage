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
                            <li class="active"> Dashboard </li>
                         </ol>
                    </div>
                </div>
                    <!--Page Title-->
                    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                    <div class="pageheader" style="margin-top:-100px;padding-bottom: 10px;">
                        <img src="<?php echo $img?>" alt="" style="width: 80px;height: 80px;border-radius: 50%;">
                        <br>
                        <h3 style="padding-top: 10px;"><?php echo $name?></h3>
                        <p style="color: #000;">Role: ADMIN</p>
                        
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
                                        <h3 class="panel-title">Update Profile</h3>
                                    </div>
                                    <!-- Panel body -->
                                    <form id="" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="panel-body" style="margin-right: -120px;">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Username</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="username" value="<?php echo $name?>" / REQUIRED>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Password</label>
                                                <div class="col-xs-5">
                                                    <input type="password" class="form-control" name="password" / required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Confirm Password</label>
                                                <div class="col-xs-5">
                                                    <input type="password" class="form-control" name="cpassword" / required>
                                                    <span class="text-danger" id="passerror"></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">Profile Picture</label>
                                                <div class="col-xs-5">
                                                    <input type="file" class="form-control" name="img" / required>
                                                    <span class="text-danger" id="imgerror"></span>
                                                </div>
                                            </div>
                                            
                                        </div>

                                            <center>
                                                
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-info btn-lg" name="update" value="Update Profile">
                                                </div>
                                            </div>
                                            </center>
                                            <br><br>
                                    </form>
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

    $folder = "picture/";
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
      if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        if ($password !=$cpassword) {
            echo "<script>document.getElementById('passerror').innerHTML = '** Passwords are not watching !!!'; </script>";
            exit();
        }
        $data = mysqli_query($sql_con,"select *from admin");
        $row = mysqli_fetch_array($data);
        $img = $row['img'];
        if (file_exists($img))
        {
          unlink($img);   
        }
        move_uploaded_file($temname,$target);
        mysqli_query($sql_con,"update admin set name = '$username',password = '$cpassword',img = '$target' where id = '$id'");
        echo "<script>alert('Account information updated successfully')</script>";
        session_start();
        if (isset($_SESSION['id'])) {
            unset($_SESSION['id']);
            echo "<script>window.location = 'index.php'</script>";
        }
      }
      else{
        echo "<script>alert('Go back and try again something wrong')</script>";
        echo "<script>window.location = 'teacher_profile.php'</script>";
      }
}
}
 ?>