<?php
    header('content-type:application:json;charset=utf8');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
    
    require('mysqlconnect.php'); 
    session_start();
    $userna=$_SESSION["user_name"];
    $sql="select * from user_register where user_name ='$userna'";
    $result=mysqli_query($db,$sql);

if($result) 
{ 
    $arr = array();  
    // 输出每行数据  
    while($row = $result->fetch_assoc()) {  
        $count=count($row);//不能在循环语句中，由于每次删除row数组长度都减小  
        for($i=0;$i<$count;$i++){  
            unset($row[$i]);//删除冗余数据  
        }  
        array_push($arr,$row);  
      
    }  
    echo json_encode($arr,JSON_UNESCAPED_UNICODE);//json编码 
    //file_put_contents("login.json",$json_string);
 
} 
 
mysqli_free_result($result);

?>