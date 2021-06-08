<?php
session_start();
include("config.php");

if (isset($_POST['register'])) {
    $obj= new Database;
    $email=$_POST['email1'].'@'.$_POST['email2'];
    $ckemail=$obj->checkemail($email);
    if($ckemail==1){
        $otp=rand(10000,99999);
        $_SESSION['otp'] = $otp;
        $mailHtml="Username: $email \n <br>".
                    
                    "OTP is: $otp.\n";
        
        $result = smtp_mailer($email,'Account Verification',$mailHtml);

        if($result==1)
        {
            if($_POST['password']==$_POST['cpassword'])
            {
                $_SESSION['firstname']=$_POST['firstname'];
                $_SESSION['middlename']=$_POST['middlename'];
                $_SESSION['lastname']=$_POST['lastname'];
                $_SESSION['email']=$email;
                $_SESSION['phone']=$_POST['phone'];
                $_SESSION['gender']=$_POST['gender'];
                $_SESSION['dob']=$_POST['dob'];
                $_SESSION['password']=$_POST['password'];
    
                echo "<script>alert('OTP has sent register Email ID');window.location = 'otp.php';</script>";
            }
            else{
                echo "<script>alert('Password and Confirm Password doesnot match');location.href='reg.php'</script>";
            }
        }
    }else {
        echo "<script>alert('Email Already exist');location.href='reg.php'</script>";
    }
}



if(isset($_POST['otp'])){
    $obj= new Database;
    $otp1=$_POST['a'].$_POST['b'].$_POST['c'].$_POST['d'].$_POST['e'];

    if($otp1 == $_SESSION['otp']){
        $res = $obj->register($_SESSION['firstname'],$_SESSION['middlename'],$_SESSION['lastname'],$_SESSION['email'],$_SESSION['phone'],$_SESSION['gender'],$_SESSION['dob'],$_SESSION['password']);
        if($res==1)
        {
          echo "<script>alert('Email Verified successfully');window.location='User/yetapproved.php';</script>";
        }
        if($res==0)
        {
          echo "<script>alert('Try Again');window.location='server.php';</script>";
        }    
        
    }
    else
    {
        echo "<script>alert('Please Enter a Valid OTP');location.href='otp.php'</script>";
    }
}


if (isset($_POST['signin'])){
    $obj= new Database;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sign=$obj->signin($email,$password);
    if($sign==1)
    {
        $_SESSION['email']=$email;
        $approved=$obj->isApproved($email);
        $payment=$obj->isPayment($email);
        if($approved==0)
            echo "<script>location.href='User/yetapproved.php'</script>";
        if($approved==1 and $payment==0)
            echo "<script>location.href='User/payment.php'</script>";
        if($approved==1 and $payment==1)
            echo "<script>location.href='User/application.php'</script>";
    }
    else
    {
        echo "<script>alert('Email And Password does not match');location.href='signin.php'</script>";
    }

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

                                    // Set email format to HTML
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

?>