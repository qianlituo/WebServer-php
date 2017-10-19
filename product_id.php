<?php
    require(mysqlconnect.php);

    $sql="select p_id from products where p_name = '$pname' ";
    $pid=mysqli_query($db,$sql);
    echo $pid;
?>