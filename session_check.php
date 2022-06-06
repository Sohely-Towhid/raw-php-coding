<?php 
if(!isset( $_SESSION['login_ok'])){
    header('location:/my_work/login/login.php');
}