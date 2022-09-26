<?php
    include('include/header.php');
?>

<div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                <div class="pageheader hidden-xs">
                  <h3><i class="fa fa-money"></i> Prices </h3>
                    <div class="breadcrumb-wrapper">
                      <span class="label">You are here:</span>
                         <ol class="breadcrumb">
                            <li> <a href="dashboard.php"> Home </a> </li>
                            <li class="active"> Update Prices </li>
                         </ol>
                    </div>
                </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <?php
                        $data = mysqli_query($sql_con,"SELECT *from prices");
                        $row = mysqli_fetch_array($data)
                    ?>
                    <div id="page-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel">
                                    <!-- Panel heading -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Update Prices</h3>
                                    </div>
                                    <!-- Panel body -->
                                    <form id="" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="panel-body" style="margin-right: -120px;">
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">STARTER PRICE</label>
                                                <div class="col-xs-5">
                                                    <input type="number" class="form-control" name="start" / REQUIRED placeholder="Range 500-2000" min="500" max="2000" value="<?php echo $row['starter']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">ADVANCED PRICE</label>
                                                <div class="col-xs-5">
                                                    <input type="number" class="form-control" name="advance" / required placeholder="Range 2500-3500" min="2500" max="3500"value="<?php echo $row['advanced']?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-xs-3 control-label">PRO PRICE</label>
                                                <div class="col-xs-5">
                                                    <input type="number" class="form-control" name="pro" / required placeholder="Range 4000-6000" min="4000" max="6000" value="<?php echo $row['pro']?>">
                                                </div>
                                            </div>
                                        </div>
                                            <center>
                                                
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-info btn-lg" name="update" value="Update Prices">
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
        $start = $_POST['start'];
        $advance = $_POST['advance'];
        $pro = $_POST['pro'];
        $id = $_GET['value'];
        mysqli_query($sql_con,"UPDATE prices SET starter='$start',advanced='$advance',pro='$pro' where id = '$id'");
        echo "<script>alert('Prices updated successfully !!!')</script>";
        echo "<script>window.location='manage_prices.php'</script>";
      }
 ?>