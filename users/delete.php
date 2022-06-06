<?php 
session_start();
require '../db.php';
$id=$_GET['id'];
$select_image="SELECT * FROM users WHERE id=$id";
$select_image_result=mysqli_query($dbconnect,$select_image);
$after_assoc=mysqli_fetch_assoc($select_image_result);



$delete_user="DELETE FROM users Where id=$id";
$delete_user_result=mysqli_query($dbconnect,$delete_user);
$delete_from='../uploads/users/'.$after_assoc['profile_image'];
unlink($delete_from);
header('location:view.php');
$_SESSION['delete_user']='User Deleted Successfully!';

?>