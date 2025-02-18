<?php
session_start();
require 'functions.php'; 
$id=$_POST['id'];
$image=$_POST['image'];
upload_avatar($id,$image);
set_flash_message("success","Профиль успешно обновлен!");
redirect_to("page_profile.php");
?>