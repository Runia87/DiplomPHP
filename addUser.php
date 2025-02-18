<?php
session_start();
require 'functions.php'; 
$email = $_POST['email'];
$password = $_POST['password'];
$username=$_POST['username'];
$job_title=$_POST['job_title'];
$status=$_POST['status'];
$image=$_POST['image'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$vk=$_POST['vk'];
$telegram=$_POST['tg'];
$instagram=$_POST['insta'];
$is_free = get_user_by_email($email);
if (!empty($is_free)) {
    set_flash_message("danger","Эл.адрес уже занят");
  //  display_flash_message("danger");
    redirect_to("create_user.php");
    
}
else{
    $id = add_user($email,$password);
    edit_Information($id,$username,$job_title,$phone,$address);
   set_status($id,$status);
    upload_avatar($id,$image);
    add_social_links($id,$telegram,$instagram,$vk);
    set_flash_message("success","Регистрация успешна");
    redirect_to("users.php");
  //  display_flash_message("success");
   
}





?>