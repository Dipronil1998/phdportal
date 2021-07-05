<?php
session_start();
include("config.php");



if (isset($_POST['signin'])){
    $obj= new Database;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sign=$obj->signin($email,$password);
    if($sign==1)
    {
        $_SESSION['admin_mail']=$email;
        echo "<script>location.href='index.php'</script>";
    }
    else
    {
        echo "<script>alert('Email And Password does not match');location.href='signin.php'</script>";
    }
}

if (isset($_POST['addguide'])){
    $obj= new Database;
    $guide=$obj->addguide($_POST['guidename'],$_POST['title'],$_POST['about']);
    if($guide==1)
    {
        echo "<script>alert('Guide Add Successfully');location.href='ourguide.php'</script>";
    }
    else
    {
        echo "<script>alert('Guide Add Failed');location.href='addguide.php'</script>";
    }
}

if (isset($_POST['approve'])){
    $obj= new Database;
    $approved=$obj->approved($_GET['id']);
    $email=$obj->email($_GET['id']);
    $mailHtml="Username: $email \n <br>".
                "Your Application is Approved.\n";
                    
    $result = smtp_mailer($email,'Application Approved',$mailHtml);
    if($approved==1 or $result==1)
    {
        echo "<script>alert('User Approved');location.href='viewapplication.php'</script>";
    }
    else
        echo "<script>alert('User not Approved');location.href='viewapplication.php'</script>";

}

function smtp_mailer($to,$subject,$msg){    
    require("class/class.phpmailer.php");

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->Host = "smtp.gmail.com";// IP address or domain name
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";

    $mail->Port = 587;  //Email Port
    $mail->Username = "publisherstop@gmail.com";// Email address of your server
    $mail->Password = "PS@publisher";// Email password

    $mail->From = "publisherstop@gmail.com"; //email address
    // $mail->FromName = "your username email";
    $mail->AddAddress($to);
    //$mail->AddReplyTo("mail@mail.com");

    $mail->IsHTML(true);

        $mail->Subject = $subject;
        $mail->Body    = $msg;
    
    //$mail->AltBody = "This is the body in plain text for non-HTML mail clients";

    if(!$mail->send()){
        return 0;
    }
    else
    {
        return 1;
    }
}
