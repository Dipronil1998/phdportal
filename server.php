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
          echo "<script>alert('Email Verified successfully');window.location='User/application.php';</script>";
        }
        if($res==0)
        {
          echo "<script>alert('Try Again');window.location='otp.php';</script>";
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
        $_SESSION['approved']=$obj->isApproved($email);
        $_SESSION['payment']=$obj->isPayment($email);
        $_SESSION['profile']=$obj->isProfile($email);
        if($_SESSION['profile']==0)
            echo "<script>location.href='User/application.php'</script>";
        if( $_SESSION['approved']==0)
            echo "<script>location.href='User/yetapproved.php'</script>";
        if($_SESSION['payment']==0)
            echo "<script>location.href='User/payment.php'</script>";
        else
            echo "<script>location.href='User/welcome.php'</script>";
    }
    else
    {
        echo "<script>alert('Email And Password does not match');location.href='signin.php'</script>";
    }
}

if (isset($_POST['fullregister'])){
    $obj= new Database;
    $mark10=$obj->checkpdf($_FILES['mark10']);
    $mark12=$obj->checkpdf($_FILES['mark12']);
    $markgra=$obj->checkpdf($_FILES['markgra']);
    $markpo=$obj->checkpdf($_FILES['markpo']);
    $photo=$obj->checkimage($_FILES['photo']);
    $sign=$obj->checkimage($_FILES['sign']);
    $addressp=$obj->checkpdf($_FILES['addressp']);
    $proforma=$obj->checkpdf($_FILES['proforma']);
    if($mark10==0 or $mark12==0 or $markgra==0 or $markpo==0 or $addressp==0 or $proforma==0)
    {
        echo "<script>alert('pdf file select');location.href='User/application.php'</script>";
        exit();
    }

    if($photo==0 or $sign==0)
    {
        echo "<script>alert('please select a image');location.href='User/application.php'</script>";
        exit();
    }

    if (!file_exists("uploaddocuments")) 
        mkdir("uploaddocuments");

    if (!file_exists("uploaddocuments/marksheet10")) 
        mkdir("uploaddocuments/marksheet10");
    $mark10=$_SESSION['email'].'_'.'marksheet10'.strstr($_FILES['mark10']['name'],'.');
    $mark10_des="uploaddocuments/marksheet10/".$mark10;
    move_uploaded_file($_FILES["mark10"]["tmp_name"],$mark10_des);

    if (!file_exists("uploaddocuments/marksheet12")) 
        mkdir("uploaddocuments/marksheet12");
    $mark12=$_SESSION['email'].'_'.'marksheet12'.strstr($_FILES['mark12']['name'],'.');
    $mark12_des="uploaddocuments/marksheet12/".$mark12;
    move_uploaded_file($_FILES["mark12"]["tmp_name"],$mark12_des);

    if (!file_exists("uploaddocuments/marksheetgraduation")) 
        mkdir("uploaddocuments/marksheetgraduation");
    $markgra=$_SESSION['email'].'_'.'marksheetgraduation'.strstr($_FILES['markgra']['name'],'.');
    $markgra_des="uploaddocuments/marksheetgraduation/".$markgra;
    move_uploaded_file($_FILES["markgra"]["tmp_name"],$markgra_des);

    if (!file_exists("uploaddocuments/marksheetpostgraduation")) 
        mkdir("uploaddocuments/marksheetpostgraduation");
    $markpo=$_SESSION['email'].'_'.'marksheetpostgraduation'.strstr($_FILES['markpo']['name'],'.');
    $markpo_des="uploaddocuments/marksheetpostgraduation/".$markpo;
    move_uploaded_file($_FILES["markpo"]["tmp_name"],$markpo_des);

    if (!file_exists("uploaddocuments/photo")) 
        mkdir("uploaddocuments/photo");
    $photo=$_SESSION['email'].'_'.'photo'.strstr($_FILES['photo']['name'],'.');
    $photo_des="uploaddocuments/photo/".$photo;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$photo_des);

    if (!file_exists("uploaddocuments/sign")) 
        mkdir("uploaddocuments/sign");
    $sign=$_SESSION['email'].'_'.'sign'.strstr($_FILES['sign']['name'],'.');
    $sign_des="uploaddocuments/sign/".$sign;
    move_uploaded_file($_FILES["sign"]["tmp_name"],$sign_des);

    if (!file_exists("uploaddocuments/addressproff")) 
        mkdir("uploaddocuments/addressproff");
    $addressp=$_SESSION['email'].'_'.'addressproof'.strstr($_FILES['addressp']['name'],'.');
    $addressp_des="uploaddocuments/addressproff/".$addressp;
    move_uploaded_file($_FILES["addressp"]["tmp_name"],$addressp_des);

    if (!file_exists("uploaddocuments/proforma")) 
        mkdir("uploaddocuments/proforma");
    $proforma=$_SESSION['email'].'_'.'proforma'.strstr($_FILES['proforma']['name'],'.');
    $proforma_des="uploaddocuments/proforma/".$proforma;
    move_uploaded_file($_FILES["proforma"]["tmp_name"],$proforma_des);
    

    $r=$obj->fillregister($_SESSION['email'],$_POST['title'],$_POST['alteremail'],$_POST['alterphone'],$_POST['fathername'],$_POST['address'],$_POST['city'],$_POST['pin'],$_POST['state'],$_POST['country'],$_POST['insti10'],$_POST['start10'],$_POST['end10'],$_POST['board10'],$_POST['per10'],$_POST['insti12'],$_POST['start12'],$_POST['end12'],$_POST['board12'],$_POST['per12'],$_POST['instigra'],$_POST['startgra'],$_POST['endgra'],$_POST['boardgra'],$_POST['pergra'],$_POST['instipo'],$_POST['startpo'],$_POST['endpo'],$_POST['boardpo'],$_POST['perpo'],$mark10,$mark12,$markgra,$markpo,$photo,$sign,$addressp,$proforma);
    if($r==1)
        echo "<script>location.href='User/yetapproved.php'</script>";
    else
        echo "<script>location.href='User/application.php'</script>";   
}

if (isset($_POST['updateregister'])){
    $obj= new Database;
    //$r=$obj->fillregister($_SESSION['email'],$_POST['alteremail'],$_POST['alterphone'],$_POST['fathername'],$_POST['address'],$_POST['city'],$_POST['pin'],$_POST['state'],$_POST['country'],$_POST['insti10'],$_POST['start10'],$_POST['end10'],$_POST['board10'],$_POST['per10'],$_POST['insti12'],$_POST['start12'],$_POST['end12'],$_POST['board12'],$_POST['per12'],$_POST['instigra'],$_POST['startgra'],$_POST['endgra'],$_POST['boardgra'],$_POST['pergra'],$_POST['instipo'],$_POST['startpo'],$_POST['endpo'],$_POST['boardpo'],$_POST['perpo'],$mark10,$mark12,$markgra,$markpo,$photo,$sign,$addressp,$proforma);
    $r=$obj->updatedata($_SESSION['email'],$_POST['title'],$_POST['alteremail'],$_POST['alterphone'],$_POST['fathername'],$_POST['address'],$_POST['city'],$_POST['pin'],$_POST['state'],$_POST['country'],$_POST['insti10'],$_POST['start10'],$_POST['end10'],$_POST['board10'],$_POST['per10'],$_POST['insti12'],$_POST['start12'],$_POST['end12'],$_POST['board12'],$_POST['per12'],$_POST['instigra'],$_POST['startgra'],$_POST['endgra'],$_POST['boardgra'],$_POST['pergra'],$_POST['instipo'],$_POST['startpo'],$_POST['endpo'],$_POST['boardpo'],$_POST['perpo']);
    if($r==1)
        echo "<script>alert('Your Profile is Update');location.href='User/viewapplication.php'</script>";
    else
        echo "<script>alert('Your Profile is not Update');location.href='User/viewapplication.php'</script>";

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

?>