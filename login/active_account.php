<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Active Your Account</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body style="background: rgb(255,191,0);
background: linear-gradient(90deg, rgba(255,191,0,1) 12%, rgba(0,0,0,1) 100%);">

    <div class="main" style="background: rgb(255,191,0);
background: linear-gradient(90deg, rgba(255,191,0,1) 12%, rgba(0,0,0,1) 100%);">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure style="margin-top: 50px;"><img src="images/active.png" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        
                    <br><br><br>
                        <h2 class="form-title" style="font-size: 28px;">Active your account</h2>
                        <p style="margin-top: -30px;margin-bottom: 30px;">Provide password which was used for signup account</p>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Your Password"/ required>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Active Account"/ style="background-color: #FFBF00;color: #000;font-weight: bolder;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
include('../include/dbcon.php');
if (isset($_POST['submit'])) {
        $password = $_POST['password'];
        $email = $_GET['value'];
        $status = '1';
        $data = mysqli_query($sql_con,"SELECT *from users where password = '$password' AND email = '$email'");
        $row_count = mysqli_num_rows($data);
        if ($row_count == 0) {
            echo "<script>alert('Please provide corrent information !!!')</script>";
            exit();    
        }
        mysqli_query($sql_con,"UPDATE users set status = '$status' where password ='$password' AND email ='$email'");
        echo "<script>alert('Your account activeted successfully now you can login !!!')</script>";
        echo "<script>window.location = 'login.php'</script>";
        }
?>