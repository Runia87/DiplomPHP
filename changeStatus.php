<?php
session_start();
require 'functions.php'; 
$id=$_POST['id'];
$status=$_POST['status'];

set_status($id,$status);
set_flash_message("success","Профиль успешно обновлен!");
redirect_to("page_profile.php");





?>