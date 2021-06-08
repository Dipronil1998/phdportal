<?php
session_start();
// $email=$_SESSION['email'];
//mail($email, "Successfully Logout", "Successfully Logout");
session_destroy();
header('location:../portal.php');
?>
