<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

    // Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);
    mysqli_query($db,"set character set 'utf8'");
    mysqli_query($db,"set names 'utf8' ");
    mysqli_query($db,"set character_set_client=utf8");
    mysqli_query($db,"set character_set_results=utf8");
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    
?>