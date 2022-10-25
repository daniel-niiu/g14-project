<?php

include "../db/dbconnection.php";

/*
$_SESSION["status"] = '';
echo "<script>alert('".$_SESSION["status"]."');</script>";
*/
if(isset($_POST['do_login'])){
	$sql = "SELECT * FROM admin WHERE admin_username = '".$_POST['username']."' AND admin_password = '".md5($_POST['password'])."'";  
	$result = $conn->query($sql); 
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		$_SESSION["name"] = $row['admin_name'];
		$_SESSION["username"] = $row['admin_username'];
		$_SESSION["password"] = $row['admin_password'];
		$_SESSION["status"] = $row['admin_status'];
		$_SESSION["type"] = $row['admin_type'];

	  } 
	  echo "success";
	}
	else{   
		$_SESSION["status"] = 'F'; 
		echo "fail";
	}
	exit();
} 
if(isset($_POST['do_forgot_password'])){
	
    $mid_sql = "SELECT EXISTS (SELECT * FROM admin WHERE admin_username = '".$_POST['email']."') AS row";
    $result = $conn->query($mid_sql);   
    $row = mysqli_fetch_array($result); 
    if ($row['row'] == 0) {  

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
	  		echo "success";
		}
	}
	else{    
		echo "fail";
	}
    
	exit();
}
?>