<html>
<head>
    <title>show the database</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
<h1>order detail</h1>

<table style='text-align:left;' border='1'>
         <tr>
             <th>order id</th>
             <th>user id</th>
             <th>product id</th>
             <th>price</th>
             <th>count</th>
         </tr>
    <?php

    require 'mysqlconnect.php';
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }else{ 
        //查询数据表中的数据
         $sql = "select * from order_item";
         $res = mysqli_query($db,$sql);
         if($res){
              $datarow = mysqli_num_rows($res); //长度
            //循环遍历出数据表中的数据
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysqli_fetch_assoc($res);
                $oid = $sql_arr['o_id'];
                $uid = $sql_arr['user_id'];
                $pid = $sql_arr['p_id'];
                $price=$sql_arr['price'];
                $count=$sql_arr['count'];
                echo "<tr>
                <td>$oid</td>
                <td>$uid</td>
                <td>$pid</td>
                <td>$price</td>
                <td>$count</td>
                </tr>";
            }
            //require('showproJSON.php');
         }else{
             printf("Could not retrieve records:%s\n",mysqli_error($db));
         }
         //require('showorderJSON.php');
         mysqli_free_result($res);
         mysqli_close($db);
     }
    
    ?>
</table>
<div>

</div>
</body>
</html>