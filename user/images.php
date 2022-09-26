<?php 
    include('include/header.php');
?>            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-image"></i> Portfolio Images </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="Dashboard.php"> Home </a> </li>
                                <li class="active"> Portfolio Images </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="panel">
                                    <div class="panel-body">
                        <div class="gamma-container gamma-loading" id="gamma-container">
                            <ul class="gamma-gallery">
                                <?php
                                    $data = mysqli_query($sql_con,"SELECT *from images");
                                    while ($row=mysqli_fetch_array($data)) {
                                        
                                ?>
                                <li>
                                    <div data-alt="img03" data-description="<h3><?php echo $row['category']?></h3>" data-max-width="1800" data-max-height="1350">
                                        <div data-src="<?php echo $row['img']?>" data-min-width="1300"></div>
                                        <div data-src="<?php echo $row['img']?>" data-min-width="1000"></div>
                                        <div data-src="<?php echo $row['img']?>" data-min-width="700"></div>
                                        <div data-src="<?php echo $row['img']?>" data-min-width="300"></div>
                                        <div data-src="<?php echo $row['img']?>" data-min-width="200"></div>
                                        <div data-src="<?php echo $row['img']?>" data-min-width="140"></div>
                                        <div data-src="<?php echo $row['img']?>"></div>
                                        <noscript>
                                            <img src="<?php echo $row['img']?>" alt="img03" />
                                        </noscript>
                                    </div>
                                </li>
                            <?php }?>
                            </ul>
					   </div>
									
									</div>
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

                <!--jQuery [ REQUIRED ]-->
        <script src="js/jquery-1.11.2.min.js"></script>
        <script src="js/jquery-migrate-1.2.1.min.js"></script>
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
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Gamma Gallery [ OPTIONAL ]-->
        <script src="plugins/gamma-gallery/js/jquery.masonry.min.js"></script>
        <script src="plugins/gamma-gallery/js/jquery.history.js"></script>
        <script src="plugins/gamma-gallery/js/js-url.min.js"></script>
        <script src="plugins/gamma-gallery/js/jquerypp.custom.js"></script>
        <script src="plugins/gamma-gallery/js/gamma.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--Demo script [ DEMONSTRATION ]-->
        <script src="js/demo/pages-gallery.js"></script>
    </body>
</html>