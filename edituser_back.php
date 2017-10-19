<?php  
require_once 'mysqlconnect.php';  

if(empty($_POST['user_id'])){  
    die('id is empty');  
}  
if(empty($_POST['user_name'])){  
    die('name is empty');  
}  
if(empty($_POST['user_password'])){  
    die('password is empty');  
}  
  
  
$id=intval($_POST['user_id']);  
$name=$_POST['user_name'];  
$pw=$_POST['user_password'];  
$mail=$_POST['user_mail'];
  
  
  
//修改指定数据  
$sql="UPDATE user_register SET user_name='$name',user_passworde='$pw',user_mail='$mail' WHERE user_id=$id";
$res = mysqli_query($db,$sql);  
  
  
//排错并返回  
if($res){  
    echo mysql_error();  
}else{  
    header("Location:showuer.php");  
}  