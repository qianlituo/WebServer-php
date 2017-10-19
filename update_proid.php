<?php
//connect mysql
require ("mysqlconnect.php");
mysqli_query($db,"set names 'utf8'");

$file=fopen("url.txt","r");
$urls=array();
$i=0;
while(!feof($file)){
    $urls[$i]=fgets($file);
    $i++;
}
fclose($file);
$urls=array_filter($urls);

for($n= 0;$n< count($urls); $n++){
    $str = str_replace(array("\r\n", "\r", "\n"), "", $urls[$n]); 
    $id= substr($str,26,5);   
    
    $sql="insert into products(product_id) values($id) where p_id=SUM(14+$n)";
    $res=mysqli_query($db,$sql);
    if($res==true){
		echo "<<script type='text/javascript'>alert('success');</script>>"."\n";
	}else{
		echo "<script type='text/javascript'>alert('failed');</script>".$sql."\n";
	}
}
mysqli_close($db);

?>