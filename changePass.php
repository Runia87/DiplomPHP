<?php
session_start();
require 'functions.php'; 
$id=$_POST['id'];
$email=$_POST['email'];
$password=$_POST['password'];
$passwordConfir=$_POST['passwordConfir'];
if($password===$passwordConfir){
edit__credentials($id,$email,$password);
set_flash_message("success","Профиль успешно обновлен!");
redirect_to("page_profile.php");
}
else{
    set_flash_message("danger","Пароли не совпадают!");
redirect_to("security.php?id=$id");

}




?>