<?php
    include('include/header.php');
?>
            <div class="boxed">
                <!--CONTENT CONTAINER-->
                <!--===================================================-->
                <div id="content-container">
                    <div class="pageheader hidden-xs">
                        <h3><i class="fa fa-briefcase"></i> Bookings </h3>
                        <div class="breadcrumb-wrapper">
                            <span class="label">You are here:</span>
                            <ol class="breadcrumb">
                                <li> <a href="dashboard.php"> Home </a> </li>
                                <li class="active"> Pending Bookings </li>
                            </ol>
                        </div>
                    </div>
                    <!--Page content-->
                    <!--===================================================-->
                    <div id="page-content">
                       <div class="row">
                             <div class="col-sm-12">

                        <!-- Basic Data Tables -->
                        <!--===================================================-->
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Pending Bookings Details</h3>
                            </div>
                            <div class="panel-body">
                                <table id="demo-dt-basic" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Phone Numner</th>
                                            <th class="min-tablet">Street Name</th>
                                            <th class="min-tablet">Street Number</th>
                                            <th class="min-tablet">City</th>
                                            <th class="min-tablet">Full Address</th>
                                            <th class="min-tablet">Booking Plan</th>
                                            <th class="min-tablet">Booking Date</th>
                                            <th class="min-tablet">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $data = mysqli_query($sql_con,"SELECT *from booking where status='0'");
                                            while($row = mysqli_fetch_array($data))
                                            {
                                                $client_id = $row['uid'];
                                                $data2 = mysqli_query($sql_con,"SELECT *from users where id='$client_id'");
                                                $row2 = mysqli_fetch_array($data2)
                                        ?>  
                                        <tr>
                                            <td><?php echo $row2['fname'] ." ". $row2['lname']?></td>
                                            <td><?php echo $row['phone']?></td>
                                            <td><?php echo $row['sname']?></td>
                                            <td><?php echo $row['snumber']?></td>
                                            <td><?php echo $row['city']?></td>
                                            <td><?php echo $row['address']?></td>
                                            <td><?php echo $row['plan']?></td>
                                            <td><?php echo $row['b_date']?></td>
                                            <td>
                                                <a href="" data-toggle = "modal" data-target= "#exampleModaldep<?php echo $row['id'];?>" class="btn btn-primary" ><i class="fa fa-edit"></i></a>

                                                  <!-- MODEL -->
                                                  <div class="modal fade" id="exampleModaldep<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Accept Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Do you really want to accept this booking?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <a href="accept_booking.php?value=<?php echo $row['id'] ?>" class="btn btn-primary">YES</a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>


                                                

                                                    <a href="" data-toggle = "modal" data-target= "#exampleModaldeptest<?php echo $row['id'];?>" class="btn btn-danger" ><i class="fa fa-trash"></i></a>

                                                  <!-- MODEL -->
                                                  <div class="modal fade" id="exampleModaldeptest<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Decline Booking</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                      </div>
                                                      <div class="modal-body">
                                                        Do you really want to decline this booking?
                                                      </div>
                                                      <div class="modal-footer">
                                                        <a href="decline_booking.php?value=<?php echo $row['id'] ?>" class="btn btn-primary">YES</a>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">NO</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
					</div>
				</div>
                        <!--===================================================-->
                        <!-- End Striped Table -->
                        
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
        <!--DataTables [ OPTIONAL ]-->
        <script src="plugins/datatables/media/js/jquery.dataTables.js"></script>
        <script src="plugins/datatables/media/js/dataTables.bootstrap.js"></script>
        <script src="plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="plugins/screenfull/screenfull.js"></script>
        <!--DataTables Sample [ SAMPLE ]-->
        <script src="js/demo/tables-datatables.js"></script>
    </body>
</html>