<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                <h2>USER SIGNUP FORM</h2>
                <div class="form-group-1">
                    <input type="text" name="fname" id="title" placeholder="First Name" required />
                    <input type="text" name="lname" id="name" placeholder="Last Name" required />
                    <div class="">
                        <select name="gender" required>
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <label style="color: #000;">(<span style="color: red;">**</span>Be carefull you can't change after signup)</label>
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <span style="color: red;" id="Semail"></span>
                    <input type="password" name="password" id="phone_number" placeholder="Password" required />
                    <input type="password" name="cpassword" id="phone_number2" placeholder="Confirm Password" required />
                    <span style="color: red;" id="Spassword"></span>
                </div>
                <div class="form-group-2">
                    <h3>Choose Profile Picture</h3>
                    <input type="file" name="img" id="phone_number3" required />
                    <span style="color: red;" id="imgerror"></span>
                </div>
                <center>
                    
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="SIGNUP" / style="padding: 15px 35px;background-color: #FFBF00;color: #000;font-weight: bolder;">
                </div>

                <div class="form-check">
                    <label for="agree-term" class="label-agree-term"><a href="../login/login.php" class="term-service">Already have an account?</a></label>
                </div>
                </center>
            </form>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php 
include ('../include/dbcon.php');
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Cpass = $_POST['cpassword'];
    $data = mysqli_query($sql_con,"select email from users");
    while ($row = mysqli_fetch_array($data)) {
    $emaildb = $row['email'];
    if($emaildb == $email){
        echo "<script>document.getElementById('Semail').innerHTML = '** Email already exist'; </script>";
        exit();
        }
    }
    if ($Cpass !=$password) {
        echo "<script>document.getElementById('Spassword').innerHTML = '** Passwords are not watching!!!'; </script>";
        exit();
    }
    $folder = "pictures/";
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
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $status = 0;
    mysqli_query($sql_con,"insert into users (fname,lname,gender,email,password,img,status) values ('$fname','$lname','$gender','$email','$Cpass','$target','$status')");
  echo "<script>alert('Successfully Registered Visit your email for account verification!!!')</script>";

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
 
  $mail->Subject = "This mail is from 'PERFECT CLICK' to activate your account.";
  $mail->Body = "<i>Please click the link below to active your account:</i><br>
                <a href='localhost/photo/login/active_account.php?value=$email'>CLICK TO ACTIVATE YOUR ACCOUNT</a>
  ";
  $mail->AltBody = "";
  if(!$mail->send())
  {
   // echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   header("location: ../login/login.php");
  }
  }
}
 ?>