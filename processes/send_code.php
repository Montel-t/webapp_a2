<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../dd/vendor/autoload.php';
require_once "../includes/dbConnect.php";
$email = mysqli_real_escape_string($dbConn, strtolower($_POST["email_address"]));
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'cmciris.org';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'redbt@cmciris.org';                     //SMTP username
    $mail->Password   = '1W*KUjaO?7c*';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to 

    //Recipients
    $mail->setFrom('redbt@cmciris.org', 'DBT1305');
    $mail->addAddress($email, 'Hi Buddy');     //Add a recipient

$secretCode = rand(100000, 999999);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Welcom to DBT1305';
    $mail->Body    = '<h3>Welcom to DBT1305</h3>
    
    Your verification code is <h2>' . $secretCode . '</h2>

<a href="http://localhost/diP_Web/ver_code.php" TARGET = "_BLACK" >Click Here</a> to proceed.

    ';


    $update_qry = "UPDATE users SET secretCode = '$secretCode' WHERE email = '$email' LIMIT 1";

    if($dbConn->query($update_qry) === TRUE){
        header("Location: ../ver_code.php");
    }else{
        print "Process Failed" . $update_qry . "<br>" . $dbConn->error;
    }

    $mail->send();