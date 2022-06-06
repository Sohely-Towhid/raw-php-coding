<?php 
session_start();
require '../db.php';
$marked_id= $_POST['mark'];
foreach($marked_id as $id){
    $delete_marked="DELETE FROM users WHERE id= $id";
    $marked_id_result=mysqli_query($dbconnect, $delete_marked);
}

$_SESSION['delete_all']='All checked deleted';
header('location:view.php');
?>