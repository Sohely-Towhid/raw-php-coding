<?php 
session_start();

require '../db.php';



$errors=[];
$filed_names=['name'=>'Name required','email'=>'Email required','password'=>'Password requierd'];

foreach($filed_names as $filed_name=>$message){

    if(empty($_POST[$filed_name])){

        $errors[$filed_name]=$message;

    }
   
    

}
if(count($errors)==0){

    $name=$_POST['name'];
    $email=$_POST['email'];
    $role=$_POST['role'];
    $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
    date_default_timezone_set('Asia/Dhaka');
    $created_at=date('y-m-d h:i:s');

    $select_email="SELECT COUNT(*) as email_exists FROM users WHERE email='$email'";
    $select_email_result=mysqli_query($dbconnect,$select_email);
    $after_assoc=mysqli_fetch_assoc($select_email_result);
    if( $after_assoc['email_exists']==1){
        $_SESSION['email_exists']='Email Already Exist';
        header('location:register.php');
      }

    else{


        $uploaded_files=$_FILES['profile_image'];
        $after_explode=explode('.',$uploaded_files['name']);
        $extension=end($after_explode);
        $allowed_extension=array('jpg','jepg','png','gif','svg');
        if(in_array($extension,$allowed_extension)){
            if($uploaded_files['size']<30000000){
                $insert_users="INSERT INTO users (name,email,password,role,created_at) values('$name','$email','$password','$role','$created_at')";
                $insert_users_result=mysqli_query($dbconnect, $insert_users);
                $id=mysqli_insert_id($dbconnect);
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
  
   $_SESSION['register_success']='Registred Successfully';
   header('location:register.php');
    }
}
else{
    $_SESSION['errors']=$errors;
    $_SESSION['name']=$_POST['name'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['password']=$_POST['password'];
header('location:register.php');
}

?>