<?php

function get_img_url($site_name){ 
   
     $reg_tag = '/<img itemprop=\"image\".*?\"([^\"]*(1_\w*.jpeg)).*?>/'; 
     $ret = preg_match($reg_tag, $site_name, $match_result); 

    // print($match_result[0]." \n");
     return $match_result[1]; 
}  


function get_img_pri($site_name){
    
    $reg_price='/<div class=\"product-detail-offers-price\">(.*?)<span>/';
    $ret = preg_match($reg_price, $site_name, $match_result); 

    // print($match_result[0]." \n");
    return $match_result[1]; 
}

function get_img_name($site_name){
    $reg_price='/<meta name=\"keywords\" content=\"(.*?)\">/';
    $ret = preg_match($reg_price, $site_name, $match_result); 
     
    // print($match_result[0]." \n");
    return $match_result[1]; 
}


//get file
$file=fopen("url.txt","r");
$urls=array();
$i=0;
while(!feof($file)){
    $urls[$i]=fgets($file);
    $i++;
}
fclose($file);
$urls=array_filter($urls);

//connect mysql
require ("mysqlconnect.php");
mysqli_query($db,"set names 'utf8'");

for($n= 0;$n< count($urls); $n++){
    $str = str_replace(array("\r\n", "\r", "\n"), "", $urls[$n]);   
    $text=file_get_contents($str);
    
    $pname=get_img_name($text);
    //echo $name;
    $price=get_img_pri($text);
    //echo $price;
    $purl=get_img_url($text);
    //echo $purl;
    $id= substr($str,26,5); 
    
    $sql="insert into products(p_name,price,p_url,product_id) values('$pname','$price','$purl',$id)";
    $res=mysqli_query($db,$sql);
	if($res==true){
		echo "<<script type='text/javascript'>alert('success');</script>>"."\n";
	}else{
		echo "<script type='text/javascript'>alert('failed');</script>".$sql;
	}
}
mysqli_close($db);

?>