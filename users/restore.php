<?php

session_start();

require '../db.php'; 
$id=$_GET['id'];

$update_status="UPDATE users SET status=0 WHERE id=$id";
$update_status_result=mysqli_query($dbconnect,$update_status);

$_SESSION['status']='User soft deleted!';
header('location:view.php');
?>