<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background-image: url('images/bg.jpg');background-repeat: no-repeat; background-size: cover;background-position: center;">

    <div class="main">

        <div class="container">
            <h2 >Please Verify Following</h2>
            <form method="POST" id="signup-form" class="signup-form" enctype="multipart/form-data">
                <h3 style="background-color: #FFBF00;">
                    Account Info
                </h3>
                <fieldset>
                    <div class="form-row">
                        <div class="form-file">
                            <input type="text" class="inputfile" readonly />
                            <label for="your_picture">
                                <?php
                                    session_start();
                                    include('../include/dbcon.php');
                                    $id = $_SESSION['sid'];
                                    $data = mysqli_query($sql_con,"SELECT *from users where id ='$id'");
                                    $row = mysqli_fetch_array($data);
                                    $img = $row['img'];
                                    $fname = $row['fname'];
                                    $lname = $row['lname'];
                                    $email = $row['email'];
                                ?>
                                <figure>
                                    <img src="../signup/<?php echo $img?>" alt="" >
                                </figure>
                                <span class="file-button">Profile Picture</span>
                            </label>
                        </div>
                        <div class="form-group-flex">
                            <div class="form-group">
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" value="<?php echo $fname?>" readonly/>
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $lname?>" readonly/>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $email?>" readonly/>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>
                    Booking Plan
                </h3>
                <?php
                    $data = mysqli_query($sql_con,"SELECT *from prices");
                    $row = mysqli_fetch_array($data);
                    $starter = $row['starter'];
                    $advanced = $row['advanced'];
                    $pro = $row['pro'];
                ?>
                <fieldset>
                    <div class="form-radio">
                        <label for="job" class="label-radio">CHOOSE BOOKING PLAN</label>
                        <div class="form-flex">
                            <div class="form-radio">
                                <input type="radio" name="job" value="STARTER" id="designer" />
                                <label for="designer">
                                    <figure>
                                        <h4 style="font-size: 20px;">$ <?php echo $starter?></h4>
                                    </figure>
                                    <span>STARTER</span>
                                </label>
                            </div>

                            <div class="form-radio">
                                <input type="radio" name="job" value="PRO" id="coder" checked="checked" />
                                <label for="coder">
                                    <figure>
                                        <h4 style="font-size: 20px;">$ <?php echo $pro?></h4>
                                    </figure>
                                    <span>PRO</span>
                                </label>
                            </div>

                            <div class="form-radio">
                                <input type="radio" name="job" value="ADVANCED" id="developer" />
                                <label for="developer">
                                    <figure>
                                        <h4 style="font-size: 20px;">$ <?php echo $advanced?></h4>
                                    </figure>
                                    <span>ADVANCED</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h3>
                    Address
                </h3>
                <fieldset>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="sname" id="street_name" placeholder="Street Name" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="snumber" id="street_number" placeholder="Street Number" />
                        </div>
                    </div>
                    <div class="form-row form-input-flex">
                        <div class="form-input">
                            <input type="text" name="city" id="city" placeholder="City" />
                        </div>
                        <div class="form-input">
                            <input type="text" name="phone" id="city" placeholder="Phone Number" />
                        </div>
                    </div>
                    <div>
                        <input type="text" name="address" id="street_name" placeholder="Full Address" />
                    </div>
                    <div style="position: absolute;right: 99px;bottom: 58px;" class="submit_btn">
                        <input type="submit" name="submit" value="Book Now" / style="background-color: #FFBF00;color: #fff; padding: 17px 36px;">
                    </div>
                </fieldset>
            </form>
            <center>
                <p>Copyright &copy 2022 <a href="../index.php">PERFECT CLICK</a></p>
            </center><br>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="vendor/jquery-validation/dist/additional-methods.min.js"></script>
    <script src="vendor/jquery-steps/jquery.steps.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
    if (isset($_POST['submit'])) {
        if (isset($_SESSION['sid'])) {
        $uid = $_SESSION['sid'];
        $plan = $_POST['job'];
        $sname = $_POST['sname'];
        $snumber = $_POST['snumber'];
        $city = $_POST['city'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $date = date("Y-m-d");
        $status = 0;
        mysqli_query($sql_con,"INSERT into booking (uid,plan,sname,snumber,city,phone,address,b_date,status) VALUES ('$uid','$plan','$sname','$snumber','$city','$phone','$address','$date','$status')");
        echo "<script>alert('Your booking successfully done keep checking your email/dashboard for booking approval !!!')</script>";
        echo "<script>window.location = '../index.php'</script>";
    }
else{
    echo "<script>window.location = 'include/msg.php'</script>";
}
}
?>