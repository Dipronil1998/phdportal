<?php
session_start();
include("config.php");

if (isset($_POST['approved'])){
    echo $_GET['id'];
    
    // $obj= new Database;
    // $approved=$obj->approved($_POST['id']);
    // if($approved)
    //     echo "<script>alert('Success');window.location='portal.php';</script>";
    // else
    //     echo "<script>alert('fail');window.location='portal.php';</script>";
}



?>