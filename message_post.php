<?php
require 'db.php';


$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];


$insert_meaasge="INSERT INTO massages( name, email, massege) VALUES ('$name','$emai','$message')";
$insert_meaasge_result=mysqli_query($dbconnect,$insert_meaasge);

header('location:index.php');





?>