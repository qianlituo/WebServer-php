<html>
<head>
    <title>show the databases</title>
    <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS"> 
    <meta charset="UTF-8" />
</head>
<body>
<h1>user list</h1>

<table style='text-align:left;' border='1'>
         <tr>
             <th>id</th>
             <th>username</th>
             <th>password</th>
             <th>mail</th>
             <th>sex</th>
             <th>edit</th>
             <th>delete</th>
         </tr>
    <?php
   require 'mysqlconnect.php';

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }else{ 
        //查询数据表中的数据
         $sql = "select * from user_register";
         $res = mysqli_query($db,$sql);
         if($res){
            $datarow = mysqli_num_rows($res); //长度
            //循环遍历出数据表中的数据
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysqli_fetch_assoc($res);
                $id = $sql_arr['user_id'];
                $name = $sql_arr['user_name'];
                $pw = $sql_arr['user_password'];
                $mail = $sql_arr['user_mail'];
                $sex = $sql_arr['user_sex'];
                echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$pw</td>
                <td>$mail</td>
                <td>$sex</td>
                <td><a href='edituser.php?user_id=$id'>edit</a></td>
                <td><a href='deleteuser.php?user_id=$id' target='_parent'>delete</a></td>
                </tr>";
            }
        }else{
             printf("Could not retrieve records:%s\n",mysqli_error($db));
        }
         //require('showuserjson.php');
         mysqli_free_result($res);
         mysqli_close($db);
     }
    
    ?>
</table>
<div>
    <button onClick="window.open('insertuser.html')">insert</button>
    <button onClick="window.open('index.html')">back</button>
</div>
</body>
</html>