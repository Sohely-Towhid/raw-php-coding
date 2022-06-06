<?php
session_start();

require '../db.php';

$email=$_POST['email'];
$password=$_POST['password'];

$select_email="SELECT COUNT(*) as email_exist,name,id,role FROM users WHERE email='$email'";
$select_email_result=mysqli_query($dbconnect,$select_email);
$after_assoc=mysqli_fetch_assoc($select_email_result);

if($after_assoc['email_exist']==1){
   
    $select_email2="SELECT * FROM users WHERE email='$email'";
    $select_email_result2=mysqli_query($dbconnect,$select_email2);
    $after_assoc2=mysqli_fetch_assoc($select_email_result2);

        if(password_verify($password,$after_assoc2['password'])){
        
            $_SESSION['login_ok']=$email;
            $_SESSION['login']=$email;
            $_SESSION['fname']=$after_assoc2['name'];
            $_SESSION['role']=$after_assoc2['role'];
            $_SESSION['id']=$after_assoc2['id'];
            $_SESSION['profile_image']=$after_assoc2['profile_image'];

            header('location:../users/admin.php');

        }

        else{
            $_SESSION['password_invalid']='Invalid password';
    header('location:login.php');


        }

    }

else{
    $_SESSION['email_invalid']='Invalid Email';
    header('location:login.php');

}

?>