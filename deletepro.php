<?php
    require'mysqlconnect.php';
    
    if(empty($_GET['p_id'])){  
        die('id is empty');  
    }  
    
    $id=intval($_GET['p_id']);  
    
    $sql="delete from products where p_id=$id";
    $res=mysqli_query($db,$sql);
    
    if($res){  
        echo mysql_error();  
    }else{  
        header("Location:showpro.php");  
    }  


?>