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
                        <figure style="margin-top: 50px;"><img src="images/password.png" alt="sing up image"></figure>
                    </div>
                    <div class="signin-form">
                        
                    <br><br><br>
                        <h2 class="form-title" style="font-size: 34px;">Forgot Password</h2>
                        <p style="margin-top: -30px;margin-bottom: 30px;">Enter the email address associated with your account.</p>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="your_pass" placeholder="Your Email"/ required>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="submit" id="signin" class="form-submit" value="Send Email"/ style="background-color: #FFBF00;color: #000;font-weight: bolder;">
                            </div>
                            <a href="login.php" class="signup-image-link" style="text-align: left;">Go to login page?</a>
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
        $email = $_POST['email'];
        $data = mysqli_query($sql_con,"SELECT *from users where email = '$email'");
        $row = mysqli_fetch_array($data);
        $password = $row['password'];
        $row_count = mysqli_num_rows($data);
        if ($row_count == 0) {
            echo "<script>alert('Please provide corrent information !!!')</script>";
            exit();    
        }

    require '../PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer();
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 1;
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();
  //Set SMTP host name
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = TRUE;
  //Provide username and password
  $mail->Username = "internshipproject78@gmail.com";
  $mail->Password = "slfzekxwwstyyptr";
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "false";
  $mail->Port = 587;
  //Set TCP port to connect to
  
  $mail->From = "internshipproject78@gmail.com";
  $mail->FromName = "PERFECT CLICK";
  
  $mail->addAddress($email);
  
  $mail->isHTML(true);
 
  $mail->Subject = "This mail is from 'PERFECT CLICK' to show your password.";
  $mail->Body = "<i>Here is your password: $password</i>";
  $mail->AltBody = "";
  if(!$mail->send())
  {
   // echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "<script>alert('Email sent successfully !!!')</script>";
   echo "<script>window.location='login.php'</script>";
  }
    }
?>