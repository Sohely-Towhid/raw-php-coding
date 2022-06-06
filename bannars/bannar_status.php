<?php 

require '../db.php';

$id=$_GET['id'];

$select_bannars="SELECT * FROM bannars WHERE id= $id";
$select_bannars_result=mysqli_query($dbconnect,$select_bannars);
$after_assoc= mysqli_fetch_assoc($select_bannars_result);


if($after_assoc['status']==1)
{


    $update_status= "UPDATE  bannars SET  status=0 WHERE id=$id";
    $update_status_result=mysqli_query($dbconnect,$update_status);

header('location:bannars.php');



}

else {

    $update_status1= "UPDATE  bannars SET  status=0";
    $update_status_result1=mysqli_query($dbconnect,$update_status1);


    $update_status= "UPDATE  bannars SET  status=1 WHERE id=$id";
    $update_status_result=mysqli_query($dbconnect,$update_status);
    
    header('location:bannars.php');
    


}





?>