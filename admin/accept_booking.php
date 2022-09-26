<?php 
include('../include/dbcon.php');
if (isset($_GET['value'])) {
	$id = $_GET['value'];
	$email = $_GET['email'];
	mysqli_query($sql_con,"UPDATE booking SET status='1' where id = '$id'");
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
 
  $mail->Subject = "This mail is from 'PERFECT CLICK'";
  $mail->Body = "<i style='color:green'>Congratulations your booking successfully approved !!!</i>";
  $mail->AltBody = "";
  if(!$mail->send())
  {
   // echo "Mailer Error: " . $mail->ErrorInfo;
  }
  else
  {
   echo "<script>window.location='pending_bookings.php'</script>";
  }
    }
 ?>