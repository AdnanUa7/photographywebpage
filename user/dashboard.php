<?php
    include('include/header.php');
?>
                    <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                <div class="pageheader hidden-xs">
                  <h3><i class="fa fa-home"></i> Dashboard </h3>
                    <div class="breadcrumb-wrapper">
                      <span class="label">You are here:</span>
                         <ol class="breadcrumb">
                            <li> <a href="dashboard.php"> Home </a> </li>
                            <li class="active"> Dashboard </li>
                         </ol>
                    </div>
                </div>
                <?php
                    $id = $_SESSION['sid'];
                    $data = mysqli_query($sql_con,"SELECT *from booking where uid = '$id'");
                    $row = mysqli_num_rows($data);

                    $data2 = mysqli_query($sql_con,"SELECT *from messages where uid='$id'");
                    $row2 = mysqli_num_rows($data2);

                    $data3 = mysqli_query($sql_con,"SELECT *from images");
                    $row3 = mysqli_num_rows($data3);
                ?>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <a href="bookings.php">
                            <div class="col-md-4 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body" style="padding: 0px 8px;">
                                        <div class="row text-center">

                                            <div style="width:100%;background-color: #F9EEE5;"><i class="fa fa-briefcase text-danger" style="font-size: 75px;color: #C5751B;padding: 20px;"></i> </div>
                                            <div class="col-sm-12">
                                                <h4 style="padding: 20px 0px;text-align: left;"><span class="counter">Your Bookings</span></h4><span class="badge badge-light" style="position: absolute;top: 28px;right: 20px;"><?php echo $row?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <a href="contacts.php">
                            <div class="col-md-4 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body" style="padding: 0px 8px;">
                                        <div class="row text-center">

                                            <div style="width:100%;background-color: #E6F4F3;"><i class="fa fa-envelope fa-3x text-danger" style="font-size: 75px;color: #0D8F83;padding: 20px;"></i> </div>
                                            <div class="col-sm-12">
                                                <h4 style="padding: 20px 0px;text-align: left;"><span class="counter">Your Messages</span></h4><span class="badge badge-light" style="position: absolute;top: 28px;right: 20px;"><?php echo $row2?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <a href="images.php">
                            <div class="col-md-4 eq-box-md grid">
                                <div class="panel">
                                    <div class="panel-body" style="padding: 0px 8px;">
                                        <div class="row text-center">

                                            <div style="width:100%;background-color: #FFE9E8;"><i class="fa fa-image fa-3x text-danger" style="font-size: 75px;color: #E12427;padding: 20px;"></i> </div>
                                            <div class="col-sm-12">
                                                <h4 style="padding: 20px 0px;text-align: left;"><span class="counter">Portfolio Pictures</span></h4><span class="badge badge-light" style="position: absolute;top: 28px;right: 20px;"><?php echo $row3?></span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <!--===================================================-->
                    <!--End page content-->
                <!--===================================================-->
                <!--END CONTENT CONTAINER-->
                    
                    <?php
                        include ('include/aside.php');
                    ?>

                <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-2.1.1.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="js/bootstrap.min.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="plugins/fast-click/fastclick.min.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="plugins/metismenu/metismenu.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="plugins/switchery/switchery.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/parsley/parsley.min.js"></script>
        <!--Jquery Steps [ OPTIONAL ]-->
        <script src="plugins/jquery-steps/jquery-steps.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Wizard [ OPTIONAL ]-->
        <script src="plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="plugins/masked-input/bootstrap-inputmask.min.js"></script>
        <!--Bootstrap Validator [ OPTIONAL ]-->
        <script src="plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
        <!--Flot Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.resize.min.js"></script>
        <script src="plugins/flot-charts/jquery.flot.spline.js"></script>
        <script src="plugins/flot-charts/jquery.flot.pie.min.js"></script>
        <script src="plugins/moment/moment.min.js"></script>
        <script src="plugins/moment-range/moment-range.js"></script>
        <script src="plugins/flot-charts/jquery.flot.tooltip.min.js"></script>
        <!--Flot Order Bars Chart [ OPTIONAL ]-->
        <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
        <!--ricksaw.js [ OPTIONAL ]-->
        <script src="plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
        <script src="plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
        <script src="plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
        <script src="plugins/jquery-ricksaw-chart/ricksaw.js"></script>
       <!--Summernote [ OPTIONAL ]-->
        <script src="plugins/summernote/summernote.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/wizard.js"></script>
        <!--Form Wizard [ SAMPLE ]-->
        <script src="js/demo/form-wizard.js"></script>
        <script src="js/demo/dashboard-v2.js"></script>
      
    </body>
</html>