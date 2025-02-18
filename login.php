<?php
session_start();
require 'functions.php'; 
$email = $_POST['email'];
$password = $_POST['password'];
$user=login($email,$password);
if (!empty($user)) {
    $_SESSION["login"]=$email;
    $_SESSION["password"]=$password;
    redirect_to("users.php");


 
    
  //  display_flash_message("danger");
   // redirect_to("page_register.php");
    
}
else{

    set_flash_message("danger","Не правильный логин или пароль");
    redirect_to("page_login.php");
}
?>