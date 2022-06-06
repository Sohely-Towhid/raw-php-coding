<?php

session_start();
require '../db.php';




$title=$_POST['title'];
$user_id=$_POST['user_id'];
$desp=$_POST['desp'];
$year=$_POST['year'];


            $insert_about="INSERT INTO abouts(user_id,title,desp,year) VALUES('$user_id','$title','$desp','$year')";
            $insert_about_result=mysqli_query($dbconnect,$insert_about);

            $_SESSION['about_success']='About added successfully!';

            header('location:add_about.php');
            
        




?>