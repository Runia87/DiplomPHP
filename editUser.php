<?php  
session_start();
require 'functions.php'; 
$id=$_POST['id'];
$username=$_POST['username'];
$job_title=$_POST['job_title'];
$phone=$_POST['phone'];
$address=$_POST['address'];
    
        redirect_to("edit.php");
       // get_user_by_id($id);
        edit__info($id,$username,$job_title,$phone,$address);
        set_flash_message("success","Профиль успешно обновлен!");
        redirect_to("page_profile.php");

    

?>