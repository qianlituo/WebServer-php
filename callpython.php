<!DOCTYPE html>
<html>
    <head>
        <title>connect</title>
    </head>
    <body>
         <h1>hello world!</h1>
<?php

header("Content-type: text/html; charset=utf-8");


//$cmd = system("python python.py",$ret);

$output = shell_exec('python main.py');


echo $output;

?>
    </body>
</html>


