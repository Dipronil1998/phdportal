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


if (isset($_POST['approve'])){
    echo($_GET['id']);
    $obj= new Database;
    $approved=$obj->approved($_GET['id']);
    if($approved==1)
    echo "<script>alert('Synopsis Approved');location.href='viewsynopsis.php'</script>";
    else
        echo "<script>alert('Synopsis not Approved');location.href='viewsynopsis.php'</script>";

}