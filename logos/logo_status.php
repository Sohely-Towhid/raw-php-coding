<?php 

require '../db.php';

$id=$_GET['id'];

$select_logos="SELECT * FROM logos WHERE id= $id";
$select_logos_result=mysqli_query($dbconnect,$select_logos);
$after_assoc= mysqli_fetch_assoc($select_logos_result);


if($after_assoc['status']==1)
{


    $update_status= "UPDATE  logos SET  status=0 WHERE id=$id";
    $update_status_result=mysqli_query($dbconnect,$update_status);

header('location:logos.php');



}

else {

    $update_status1= "UPDATE  logos SET  status=0";
    $update_status_result1=mysqli_query($dbconnect,$update_status1);


    $update_status= "UPDATE  logos SET  status=1 WHERE id=$id";
    $update_status_result=mysqli_query($dbconnect,$update_status);
    
    header('location:logos.php');
    


}





?>