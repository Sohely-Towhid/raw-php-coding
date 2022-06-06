<?php

session_start();
require '../db.php';




$title=$_POST['title'];
$desp=$_POST['desp'];
$btn=$_POST['btn'];


$uploaded_file=$_FILES['image'];
$after_explode=explode('.',$uploaded_file['name']);
$extension=end($after_explode);
$allowed_extension=array('jpg','jepg','png','gif','svg');


if(in_array($extension,$allowed_extension)){
    if($uploaded_file['size'] < 3000000){
            $insert_bannar="INSERT INTO bannars(title,desp,btn) VALUES('$title','$desp','$btn')";
            $insert_bannar_result=mysqli_query($dbconnect,$insert_bannar);

            $id = mysqli_insert_id($dbconnect);
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/bannars/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
            $update_bannar_image="UPDATE bannars SET image = '$file_name' WHERE id=$id";
            $update_bannar_image_result=mysqli_query($dbconnect,$update_bannar_image);
            $_SESSION['bannar_success']='Bannar Added Successfully';
            header('location:add_bannar.php');
            
        }




        else{
            $_SESSION['size']='File size too large';
            header('location:add_bannar.php');

        }




    }

else{

    $_SESSION['extension']='invalid extension';
    header('location:add_bannar.php');
}


?>