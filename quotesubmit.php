<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if(isset($_POST['q_submit']))
{
    $name= $_POST['q_name'];
    $email=$_POST['q_email'];
    $mobile=$_POST['q_mobile'];
    $servicerequired=$_POST['q_servicerequired'];
    $location=$_POST['q_location'];
    $addinfo=$_POST['q_addinfo'];


    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP(); //Send using SMTP
        $mail->SMTPAuth   = true;  //Enable SMTP authentication
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        
        $mail->Username   = 'aravindmarshall.tech@gmail.com';                     //SMTP username
        $mail->Password   = 'jvwxcwkfvflkluvw';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
        $mail->setFrom('aravindmarshall.tech@gmail.com', 'Mailer');
        $mail->addAddress('aravindmarshall.tech@gmail.com','funn');     //Add a recipient
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Quotation - Harrison&Associates Ltd Qute Form';
        $mail->Body    = '<h3> ----- <b>Harrison&Associates Ltd</b> ----- <br>Hello Team, we got a new Quote Request
	<br><h3>Customer Details</h3>
	<h4>-------------------------------</h4>
        <h4><b>Name : </b>'.$name.'</h4>
        <h4><b>Email : </b>'.$email.'</h4>
	<h4><b>Mobile : </b>'.$mobile.'</h4>
	<h4><b>Location : </b>'.$location.'</h4>
	<h4><b>Service Required : </b>'.$servicerequired.'</h4>
	<h4><b>Additional Information : </b>'.$addinfo.'</h4>
<h4>-------------------------------</h4>
    ';
       
        if($mail->send())
        {
            $_SESSION['status']="Thank you for contacting us - WeCode";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);        
        }
        else{
            $_SESSION['status']="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            header("Location: {$_SERVER["HTTP_REFERER"]}");
            exit(0);
        }
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else
{
    header('Location: index.html');
    exit(0);
}

?>