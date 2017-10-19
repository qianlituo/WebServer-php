<?php  
require 'mysqlconnect.php';?>  
<!DOCTYPE html>  
<html>  
<head>  
    <meta charset="UTF-8">  
    <title>modify the user information</title>  
</head>  
<body>  
<?php  
    if(!empty($_GET['user_id'])){  

  
        //查找id  
        $id=intval($_GET['user_id']);  
        $sql="SELECT * FROM user_register WHERE user_id=$id";
        
        $result=mysqli_query($db,$sql);  
        
        if(mysql_error()){  
            die('can not connect db');  
        }  
        //获取结果数组  
        $result_arr=mysqli_fetch_assoc($result);  
    }else{  
        die('id not define');  
    }  
?>  
<form action="edituser_back.php" method="post">  
    <label>user ID：</label><input type="text" name="id" value="<?php echo $result_arr['user_id']?>">  
    <label>user name：</label><input type="text" name="name" value="<?php echo $result_arr['user_name']?>">  
    <label>user password：</label><input type="text" name="pw" value="<?php echo $result_arr['user_password']?>">  
    <label>user email：</label><input type="text" name="mail" value="<?php echo $result_arr['user_mail']?>">  

    <input type="submit" value="Submit">  
</form>  
</body>  
</html>  