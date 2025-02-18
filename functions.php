<?php
$pdo = new PDO("mysql:host=MySQL-8.0;dbname=data","root","");

function get_user_by_email($email){
    global $pdo;
    $sql = "SELECT * FROM users WHERE email =  :email";
    $statement=$pdo->prepare($sql);
    $statement->execute(["email"=>$email]);
    $user=$statement->fetch(PDO::FETCH_ASSOC);
    return $user;
    }

function add_user($email,$password){
global $pdo;
$sql = "INSERT into users(email,password) values(:email,:password)";
$statement=$pdo->prepare($sql);
$statement->execute(["email"=>$email,"password"=>$password]);
$sql2="SELECT id FROM users WHERE email=:email";
$statement=$pdo->prepare($sql2);
$statement->execute(["email"=>$email]);
$user=$statement->fetch(PDO::FETCH_ASSOC);
//var_dump($user);
//die();
return $user['id'];

}

function set_flash_message($name,$message){

    $_SESSION[$name]=$message;
}
function display_flash_message($name){

    echo $_SESSION[$name];
}
function redirect_to($path){
    header("location:/$path");
}

function login($email,$password){
    global $pdo;
    $sql="SELECT id,email,roles, password FROM users WHERE email = :email AND password = :password";
    $statement=$pdo->prepare($sql);
    $statement->execute(["email"=>$email,"password"=>$password]);
    $user=$statement->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user']=$user;
    return $user;
} 

function is_logged_in(){

    if(isset($_SESSION['user'])){
        return true;
    }
      else {
        return false;
    } 
    }

function is_not_logged_in(){
    return !is_logged_in();
}

function get_users(){
    global $pdo;
    $sql="SELECT * FROM users";
    $statement=$pdo->prepare($sql);
    $statement->execute();
    $user=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $user;
}

function get_authenticated_user(){

    if(is_logged_in()){
        return $_SESSION['user'];
    }
   else {
        return false;
    }
    
}

function is_admin($user){

    
      if($user['roles']==="admin"){
        return true;
      }
      else{
      return false;
    }

}

function is_equal($user, $current_user){

    return $user["id"]===$current_user["id"];
}

function edit_Information($id,$username,$job_title,$phone,$address){
global $pdo;
$sql="UPDATE users SET username=:username,job_title=:job_title,phone=:phone,address=:address WHERE id = :id";
$statement=$pdo->prepare($sql);
$statement->execute(["id"=>$id,"username"=>$username,"job_title"=>$job_title,"phone"=>$phone,"address"=>$address]);
$statement->fetch(PDO::FETCH_ASSOC);
}
function set_status($id,$status){
global $pdo;
$sql="UPDATE users SET status=:status WHERE id=:id";
$statement=$pdo->prepare($sql);
$statement->execute(["id"=>$id,"status"=>$status]);
$statement->fetch(PDO::FETCH_ASSOC);
}

function upload_avatar($id,$image){
    global $pdo;
    $sql="UPDATE users SET image='img/demo/avatars/' :image WHERE id=:id";
    $statement=$pdo->prepare($sql);
    $statement->execute(["id"=>$id,"image"=>$image]);
    $statement->fetch(PDO::FETCH_ASSOC);   

}

function add_social_links($id,$telegram,$instagram,$vk){
global $pdo;
$sql="UPDATE users SET telegram=:telegram,instagram=:instagram,vk=:vk WHERE id=:id";
$statement=$pdo->prepare($sql);
$statement->execute(["id"=>$id,"telegram"=>$telegram,"instagram"=>$instagram,"vk"=>$vk]);
$statement->fetch(PDO::FETCH_ASSOC);
}

function is_author($logged_user_id,$edit_user_id){
    if($logged_user_id===$edit_user_id){
        return true;
    }
    else{
        return false;
    }
}

function get_user_by_id($id){
    global $pdo;
    $sql = "SELECT * FROM users WHERE id =  :id";
    $statement=$pdo->prepare($sql);
    $statement->execute(["id"=>$id]);
    $user=$statement->fetch(PDO::FETCH_ASSOC);
    return $user;  
}

function edit__info($id,$username,$job_title,$phone,$address){
global $pdo;
$sql="UPDATE users SET username=:username,job_title=:job_title,phone=:phone,address=:address WHERE id=:id";
$statement=$pdo->prepare($sql);
$statement->execute(["id"=>$id,"username"=>$username,"job_title"=>$job_title,"phone"=>$phone,"address"=>$address]);
$statement->fetch(PDO::FETCH_ASSOC);

}

function edit__credentials($id,$email,$password){
    global $pdo;
    
    $sql="UPDATE users SET email=:email,password=:password WHERE id=:id";
    $statement=$pdo->prepare($sql);
    $statement->execute(["id"=>$id,"email"=>$email,"password"=>$password]);
    $statement->fetch(PDO::FETCH_ASSOC);


}

function delete($id){
    global $pdo;
    $sql="DELETE FROM users WHERE id=:id";
    $statement=$pdo->prepare($sql);
    $statement->execute(["id"=>$id]);
    $statement->fetch(PDO::FETCH_ASSOC);
    
}

?>