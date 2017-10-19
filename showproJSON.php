<?php
    header('content-type:application:json;charset=utf8');
    header('Access-Control-Allow-Origin:*');
    header('Access-Control-Allow-Methods:POST');
    header('Access-Control-Allow-Headers:x-requested-with,content-type');
//需要执行的SQL语句
//单条

//多条数据
//$sql="select id,name from tbl_user";
 
//调用conn.php文件进行数据库操作 
require('mysqlconnect.php'); 
$sql="select * from products";
$result=mysqli_query($db,$sql);
//提示操作成功信息，注意：$result存在于conn.php文件中，被调用出来 
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
    //file_put_contents("showpro.json",$json_string);
 
} 
 
mysqli_free_result($result);

 
?>