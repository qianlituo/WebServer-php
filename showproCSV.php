<?php
    require("mysqlconnect.php");
    
    $sql="select product_id,p_name from products";
    $iroya=array();
    $res=mysqli_query($db,$sql);
    if($res){
        $datarow = mysqli_num_rows($res);
        for($i=0;$i<$datarow;$i++){
                $sql_arr = mysqli_fetch_assoc($res);
                echo $sql_arr[$i];
            }
        //file_put_contents("iroya_data.csv",$sql_arr);
        
    }
    
    mysqli_close($db);
?>