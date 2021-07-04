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
