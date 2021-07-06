<?php
include("../config.php");
$id=$_POST['id'];
$obj= new config();
$result=mysqli_query($obj->conn,"SELECT * FROM guide WHERE name='$id'");
$row =mysqli_fetch_assoc($result);
echo json_encode($row);

?>