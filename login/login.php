<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form</title>

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
                        <figure><img src="images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="../signup/index.php" class="signup-image-link">Don't have an account?</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">LOGIN</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-email material-icons-name"></i></label>
                                <input type="email" name="email" id="your_name" placeholder="Your Email"/ required>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password"/ required>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Log in"/ style="background-color: #FFBF00;color: #000;font-weight: bolder;">
                            </div>
                            <a href="password.php" class="signup-image-link" style="text-align: left;">Forgot Password?</a>
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
  session_start();
  include('../include/dbcon.php');
  if(isset($_POST['submit'])){
    $value1 = $_POST["email"];
    $value2 = $_POST["password"];
    $data = mysqli_query($sql_con,"select *from users where email = '$value1' AND password='$value2'");
    $datarow = mysqli_num_rows($data);
    if ($datarow > 0) {
      $row = mysqli_fetch_array($data);
      $value3 = $row['id'];
      $status = $row['status'];
      if ($status==0) {
        echo "<script>alert('Please active your account through your email !!!')</script>";
        exit();    
      }
      $_SESSION['sid'] = $value3;
      echo "<script>window.location='../index.php'</script>";
    }
    else{
      echo "<script>alert('Invalid information please try again')</script>";
    }
    
  }

 ?>