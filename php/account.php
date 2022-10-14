<?php

include "../db/dbconnection.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../phpmailer/vendor/autoload.php';

require '../../phpmailer/vendor/phpmailer/phpmailer/src/Exception.php';
require '../../phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require '../../phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php'; 

$method = $_GET["method"];

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZw!@#$%^&*()_', ceil($length/strlen($x)) )),1,$length);
}

if($method === "add")
{
    global $conn;  
    
    $userpassword = generateRandomString();
        $name = "Tze Yin Member Management System";  // Name of your website or yours
        $to = $_POST['email'];  // mail of reciever
        $subject = "Your account created";
        $body = "This is your password $userpassword";
        $from = "angelxsting997@gmail.com";  // you mail
        $password = "ouyjodkprzmtpqhp";  // your gmail app password

        // Ignore from here
 
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        //$mail->SMTPDebug = 3; // Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 465;  // port
        $mail->SMTPSecure = "ssl";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            //echo "Your  is sent!";
        } else {
            //echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    
    $acc_type = "";
    $data = "";
    if($_POST['account-type'] != "admin"){
        foreach ($_POST['checkbox'] as $d){ 
            $data .= $d.",";
        }
        $data = rtrim($data,",");
        $data = $_POST['account-type']."(".$data.")";
        $acc_type = $data;
    }
    else{
        $acc_type = $_POST['account-type'];
    }
    $sql = "INSERT INTO admin (admin_name, admin_username, admin_password, admin_status, admin_type) VALUES ('".$_POST['name']."','".$_POST['email']."','".md5($userpassword)."','".$_POST['checkbox_value']."','".$acc_type."')"; 
    
    if (mysqli_query($conn,$sql)) {
        header("Location: ../accounts/create-account.php?name=account&aside=create-account&success=success");
    } 
    else{
        header("Location: ../accounts/create-account.php?name=account&aside=create-account&success=fail");
    } 
    
}  

if($method === "update")
{
    global $conn;
    //because disabled input
    $email = $_POST['hid_email'];
    if($email == "admin"){ 
        //header("Location: ../accounts/search-account.php?name=account&aside=search-account");
    }
    else{ 
        $acc_type = "";
        $data = "";
        if($_POST['account-type'] != "admin"){
            foreach ($_POST['checkbox'] as $d){ 
                $data .= $d.",";
            }
            $data = rtrim($data,",");
            $data = $_POST['account-type']."(".$data.")";
            $acc_type = $data;
        }
        else{
            $acc_type = $_POST['account-type'];
        }
        $sql = "UPDATE admin SET admin_status = '".$_POST['checkbox_value']."' , admin_type = '".$acc_type."' WHERE admin_username = '".$email."'"; 
        
        if (mysqli_query($conn,$sql)) {
            header("Location: ../accounts/search-account.php?name=account&aside=search-account");
        } 
        else{
            header("Location: ../accounts/search-account.php?name=account&aside=search-account");
        } 
        
    } 

}
 
if($method === "updatePassword")
{
    global $conn;
    //because disabled input 
    $email = $_SESSION['username']; 
    $newpw = $_POST['confirm-password'];
    $sql = "UPDATE admin SET admin_password = '".md5($newpw)."' WHERE admin_username = '".$email."'"; 
    if (mysqli_query($conn,$sql)) {
        header("Location: ../index.php");
    } 
    else{
        header("Location: ../index.php");
    }  
}
 
if($method === "forgetPassword")
{
    $userpassword = generateRandomString();
        $name = "Tze Yin Member Management System";  // Name of your website or yours
        $to = $_POST['email'];  // mail of reciever
        $subject = "Forget Password";
        $body = "The system was genereted a new password for you, the password is $userpassword";
        $from = "angelxsting997@gmail.com";  // you mail
        $password = "ouyjodkprzmtpqhp";  // your gmail app password

        // Ignore from here
 
        $mail = new PHPMailer();

        // To Here

        //SMTP Settings
        $mail->isSMTP();
        //$mail->SMTPDebug = 3; // Keep It commented this is used for debugging                          
        $mail->Host = "smtp.gmail.com"; // smtp address of your email
        $mail->SMTPAuth = true;
        $mail->Username = $from;
        $mail->Password = $password;
        $mail->Port = 465;  // port
        $mail->SMTPSecure = "ssl";  // tls or ssl
        $mail->smtpConnect([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            ]
        ]);

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($from, $name);
        $mail->addAddress($to); // enter email address whom you want to send
        $mail->Subject = ("$subject");
        $mail->Body = $body;
        if ($mail->send()) {
            //echo "Your  is sent!";
        } else {
            //echo "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }
    
}
?>