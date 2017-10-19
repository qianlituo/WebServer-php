<!DOCTYPE html>
<html>
    <head>
        <title>img</title>
    </head>
    <body>
        <img src="engine/ColorAnalyze-master/7.1-7.7/Black forest - L.jpeg"></img>
        <?php

// the following strings are valid JavaScript but not valid JSON

// the name and value must be enclosed in double quotes
// single quotes are not valid 
$json = '{"foo-bar": 12345}';

$obj = json_decode($json);
print $obj->{'foo-bar'}; // 12345

?>
    </body>
</html>

