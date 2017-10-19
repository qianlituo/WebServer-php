<html lang="ja">
<head>
    <title>show the database</title>
    <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS"> 
    <meta charset="UTF-8" />
</head>
<body>
<h1>product detail</h1>

<table style='text-align:left;' border='1'>
         <tr>
             <th>id</th>
             <th>product id</th>
             <th>product name</th>
             <th>price</th>
             <th>image</th>
             <th>delete</th>
         </tr>
    <?php
    header('Content-Type: text/html; charset=UTF-8');
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    mysqli_query($db,"set character set 'utf8'");
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }else{ 
        //查询数据表中的数据
         $sql = "select * from products";
         $res = mysqli_query($db,$sql);
         if($res){
              $datarow = mysqli_num_rows($res); //长度
            //循环遍历出数据表中的数据
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysqli_fetch_assoc($res);
                $id = $sql_arr['p_id'];
                $name = $sql_arr['p_name'];
                $pw = $sql_arr['price'];
                $proid=$sql_arr['product_id'];
                $url=$sql_arr['p_url'];
                echo "<tr>
                <td>$id</td>
                <td>$proid</td>
                <td>$name</td>
                <td>$pw</td>
                <td> <img src='".$url."' height='10%'> </td>
                <td><a href='deletepro.php?p_id=$id'>delete</a></td>
                </tr>";
            }
            //require('showproJSON.php');
         }else{
             printf("Could not retrieve records:%s\n",mysqli_error($db));
         }
         //require('showproJSON.php');
         mysqli_free_result($res);
         mysqli_close($db);
     }
    
    ?>
    <button onClick="window.open('insertpro.html')">insert</button>
    <button onClick="window.open('index.html')">back</button>
</table>
<div>

</div>
</body>
</html>