<?php
session_start();
require '../db.php';
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);


$uploaded_files=$_FILES['profile_image'];
$after_explode=explode('.',$uploaded_files['name']);
$extension=end($after_explode);
$allowed_extension=array('jpg','jepg','png','gif','svg');

if(empty($_POST['password'])){
    if($_FILES['profile_image']['name'] !=''){
        
        if(in_array($extension,$allowed_extension)){
            if($uploaded_files['size']<30000000){
        
                    $select_image="SELECT * FROM users WHERE id=$id";
                    $select_image_result=mysqli_query($dbconnect,$select_image);
                    $after_assoc=mysqli_fetch_assoc($select_image_result);
                    $delete_from='../uploads/users/'.$after_assoc['profile_image'];
                    unlink($delete_from);

                    $update_user= "UPDATE users SET name='$name', email='$email' WHERE id=$id";
                    $update_user_result=mysqli_query($dbconnect,$update_user);
        
                    
                $filed_name=$id.'.'.$extension;
                $new_location='../uploads/users/'.$filed_name;
                move_uploaded_file($uploaded_files['tmp_name'],$new_location);
                $update_users_image="UPDATE users SET profile_image= '$filed_name' WHERE id=$id";
                $update_users_image_reasult=mysqli_query($dbconnect,$update_users_image);
                header('location:register.php');
            }
            else{
                $_SESSION['size']='File size too large';
            header('location:register.php');
            }
        }
        
        else{
        $_SESSION['extension']='invalid extension';
        header('location:register.php');
        }
        
        
            }
        else{
        
        
            $update_user= "UPDATE users SET name='$name', email='$email' WHERE id=$id";
                $update_user_result=mysqli_query($dbconnect,$update_user);
                $_SESSION['update_success']='User updated!';
                header('location:edit_user.php?id='.$id);
        
        
        
        }
        
        

}

else{
    if($_FILES['profile_image']['name'] !=''){
        
        if(in_array($extension,$allowed_extension)){
            if($uploaded_files['size']<30000000){
        
                    $select_image="SELECT * FROM users WHERE id=$id";
                    $select_image_result=mysqli_query($dbconnect,$select_image);
                    $after_assoc=mysqli_fetch_assoc($select_image_result);
                    $delete_from='../uploads/users/'.$after_assoc['profile_image'];
                    unlink($delete_from);

                    $update_user= "UPDATE users SET name='$name', email='$email',password='$password' WHERE id=$id";
                    $update_user_result=mysqli_query($dbconnect,$update_user);
        
                    
                $filed_name=$id.'.'.$extension;
                $new_location='../uploads/users/'.$filed_name;
                move_uploaded_file($uploaded_files['tmp_name'],$new_location);
                $update_users_image="UPDATE users SET profile_image= '$filed_name' WHERE id=$id";
                $update_users_image_reasult=mysqli_query($dbconnect,$update_users_image);
                header('location:register.php');
            }
            else{
                $_SESSION['size']='File size too large';
            header('location:register.php');
            }
        }
        
        else{
        $_SESSION['extension']='invalid extension';
        header('location:register.php');
        }
        
        
            }
        else{
        
        
            $update_user= "UPDATE users SET name='$name', email='$email',password='$password' WHERE id=$id";
                $update_user_result=mysqli_query($dbconnect,$update_user);
                $_SESSION['update_success']='User updated!';
                header('location:edit_user.php?id='.$id);
        
        
        
        }
        
        


}






    

?>