<?php
session_start();
require 'functions.php'; 
$email = $_POST['email'];
$password=$_POST['password'];
$user=get_user_by_email($email);
if (!empty($user)) {
    set_flash_message("danger","Эл.адрес уже занят");
  //  display_flash_message("danger");
    redirect_to("page_register.php");
    
}
else{
    add_user($email,$password);
    set_flash_message("success","Регистрация успешна");
  //  display_flash_message("success");
    redirect_to("page_login.php");
}


?>


