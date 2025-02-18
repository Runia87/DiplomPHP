<?php 
session_start();
require "functions.php";
$authUser=login($_SESSION["login"],$_SESSION["password"]);
$_SESSION['authUserId']=$authUser['id'];
if(is_not_logged_in()){
    redirect_to("page_login.php");
    exit;
}

if(!is_admin($_SESSION['user']))
{if(!is_author($_SESSION['authUserId'],$_GET['id'])){
    set_flash_message("danger","Можно редактировать только свой профиль!");
    redirect_to("users.php");
}}

$user = get_user_by_id($_GET['id']);
$id=$user['id'];
$_SESSION['id']=$_GET['id'];

delete($id);
set_flash_message("success","Пользователь удален!");
if($authUser['id']===$id){
    redirect_to("page_register.php");  
}
else{
    
    redirect_to("users.php");
}

?>