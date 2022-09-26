<?php
    include('include/header.php');
?>

<div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                <div class="pageheader hidden-xs">
                  <h3><i class="fa fa-money"></i> Upload Images </h3>
                    <div class="breadcrumb-wrapper">
                      <span class="label">You are here:</span>
                         <ol class="breadcrumb">
                            <li> <a href="dashboard.php"> Home </a> </li>
                            <li class="active"> Upload Images </li>
                         </ol>
                    </div>
                </div>
                    <!--Page content-->
                    <!--===================================================-->

                    <div id="page-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <!-- Panel heading -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="text-danger">Note: Only </span>'JPG' 'PNG' <span class="text-danger">&</span> 'JPEG' <span class="text-danger">formats are allowed</span></h3>
                                    </div>
                                    <!-- Panel body -->
                                    <form id="" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="panel-body" style="margin-right: -120px;">
                                            <div class="form-group">
                                                <label class="col-sm-11 text-left control-label"><b>Image Category</b></label>
                                                <div class="col-sm-11">
                                                    <input type="text" class="form-control" name="Category" / REQUIRED placeholder="Enter Image Category">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-11 text-left control-label"><b>Choose image to upload</b></label>
                                                <div class="col-sm-11">
                                                    <input type="file" class="form-control" name="img" / required>
                                                    <span class="text-danger" id="imgerror"></span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                            <center>
                                                
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-info btn-lg" name="submit" value="Upload Image">
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
if (isset($_POST['submit'])) {
    $category = $_POST['Category'];
    
    $folder = "uploads/";
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
    move_uploaded_file($temname,$target);
    mysqli_query($sql_con,"INSERT into images (category,img) values ('$category','$target')");
  echo "<script>alert('Image uploaded Successfully !!!')</script>";
  echo "<script>window.location='images.php'</script>";
  }
}
 ?>