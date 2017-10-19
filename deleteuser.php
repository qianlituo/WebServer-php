<?php
    require'mysqlconnect.php';
    
    if(empty($_GET['user_id'])){  
        die('id is empty');  
    }  
    
    $id=intval($_GET['user_id']);  
    
    $sql="delete from user_register where user_id=$id";
    $res=mysqli_query($db,$sql);
    
    if($res){  
        echo mysql_error();  
    }else{  
        header("Location:showuer.php");  
    }  


?>