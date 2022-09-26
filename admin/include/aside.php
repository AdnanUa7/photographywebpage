<!--MAIN NAVIGATION-->
                <!--===================================================-->
                <nav id="mainnav-container">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="dashboard.php" class="navbar-brand">
                            <i class="fa fa-camera brand-icon"></i>
                            <div class="brand-title">
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <div id="mainnav">
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <!--Category name-->
                                        <li class="list-header">Navigation</li>
                                        <!--Menu list item-->
                                        <li> <a href="dashboard.php"> <i class="fa fa-home"></i> <span class="menu-title"> Dashboard </span> </a> </li>
                                        <!--Category name-->
                                        <li class="list-header">Menu</li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-money"></i>
                                            <span class="menu-title">Prices</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="add_prices.php"><i class="fa fa-caret-right"></i>Add Prices </a></li>
                                                <li><a href="manage_prices.php"><i class="fa fa-caret-right"></i> Manage Prices </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="#">
                                            <i class="fa fa-briefcase"></i>
                                            <span class="menu-title">Bookings</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <?php
                                                include ('../include/dbcon.php');
                                                $data = mysqli_query($sql_con,"SELECT *from booking where status='0'");
                                                $row = mysqli_num_rows($data);
                                            ?>
                                            <ul class="collapse">
                                                <li><a href="pending_bookings.php"><i class="fa fa-caret-right"></i> Pending <span class="badge badge-danger"><?php echo $row?></span></a></li>
                                                <li><a href="accepted_bookings.php"><i class="fa fa-caret-right"></i> Approved </a></li>
                                                <li><a href="declined_bookings.php"><i class="fa fa-caret-right"></i> Declined </a></li>
                                            </ul>


                                        <li> 
                                            <a href="all_users.php"> <i class="fa fa-users"></i> <span class="menu-title"> All Users</span> </a> 
                                            <a href="contacts.php"> <i class="fa fa-envelope"></i> <span class="menu-title"> User Contacts</span> </a>
                                            <a href="images.php"> <i class="fa fa-image"></i> <span class="menu-title"> Portfolio Images</span> </a>
                                        </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->
                    </div>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
                </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <footer id="footer">
               
                <a href="../index.php"><p class="pad-lft">&#0169; 2022 PERFECT CLICK</p></a>
            </footer>
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->