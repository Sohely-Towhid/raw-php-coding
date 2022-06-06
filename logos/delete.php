<?php 
session_start();
require '../db.php';
$id=$_GET['id'];
$select_image="SELECT * FROM logos WHERE id=$id";
$select_image_result=mysqli_query($dbconnect,$select_image);
$after_assoc=mysqli_fetch_assoc($select_image_result);



$delete_logo="DELETE FROM logos Where id=$id";
$delete_logo_result=mysqli_query($dbconnect,$delete_logo);
$delete_from='../uploads/logos/'.$after_assoc['logo'];
unlink($delete_from);

$_SESSION['delete_logo']='logo Deleted Successfully!';
header('location:logos.php');

?>