<?php

session_start();
require '../db.php';




$logo=$_FILES['logo']['name'];


$uploaded_file=$_FILES['logo'];
$after_explode=explode('.',$uploaded_file['name']);
$extension=end($after_explode);
$allowed_extension=array('jpg','jepg','png','gif','svg');


if(in_array($extension,$allowed_extension)){
    if($uploaded_file['size'] < 3000000){
            $insert_logo="INSERT INTO logos(logo) VALUES('$logo')";
            $insert_logo_result=mysqli_query($dbconnect,$insert_logo);

            $id = mysqli_insert_id($dbconnect);
            $file_name = $id.'.'.$extension;
            $new_location = '../uploads/logos/'.$file_name;
            move_uploaded_file($uploaded_file['tmp_name'],$new_location);
            $update_logo_image="UPDATE logos SET logo = '$file_name' WHERE id=$id";
            $update_logo_image_result=mysqli_query($dbconnect,$update_logo_image);
            $_SESSION['logo_success']='logo Added Successfully';
            header('location:add_logo.php');
            
        }




        else{
            $_SESSION['size']='File size too large';
            header('location:add_logo.php');

        }




    }

else{

    $_SESSION['extension']='invalid extension';
    header('location:add_logo.php');
}


?>