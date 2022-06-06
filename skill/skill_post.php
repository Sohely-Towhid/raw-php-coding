<?php

session_start();
require '../db.php';




$user_id=$_POST['user_id'];

$skill_name=$_POST['skill_name'];
$percentage=$_POST['percentage'];



            $insert_skill="INSERT INTO skills(user_id,skill_name,percentage) VALUES('$user_id','$skill_name','$percentage')";
            $insert_skill_result=mysqli_query($dbconnect,$insert_skill);

            $_SESSION['skill_success']='skill added successfully!';

            header('location:add_skill.php');
            
        




?>