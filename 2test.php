<?php
/*完成网页内容捕获功能*/
function get_img_url($site_name){ 
 $site_fd = fopen($site_name, "r"); 
 $site_content = ""; 
 while (!feof($site_fd)) { 
  $site_content .= fread($site_fd, 1024); 
 } 
 /*利用正则表达式得到图片链接*/
 $reg_tag = '/<img itemprop=\"image\".*?\"([^\"]*(1_\w*.jpeg)).*?>/'; 
 $ret = preg_match_all($reg_tag, $site_content, $match_result); 
 fclose($site_fd); 
// print($match_result[0]." \n");
 return $match_result[1]; 
}  
  
/* 对图片链接进行修正 */
function revise_site($site_list, $base_site){ 
 foreach($site_list as $site_item) { 
  if (preg_match('/^http/', $site_item)) {
   $return_list[] = $site_item; 
  }else{ 
   $return_list[] = $base_site."/".$site_item; 
  } 
 } 
 return $return_list; 
} 
  
/*得到图片名字，并将其保存在指定位置*/
function get_pic_file($pic_url_array, $pos){ 
 $reg_tag = '/.*\/(.*?)$/'; 
 $count = 0; 
 foreach($pic_url_array as $pic_item){ 
  $ret = preg_match_all($reg_tag,$pic_item,$t_pic_name); 
  $pic_name = $pos.$t_pic_name[1][0]; 
  
  $pic_url = $pic_item; 
 print("Downloading ".$pic_url." "); 
  $img_read_fd = fopen($pic_url,"r"); 
  $img_write_fd = fopen($pic_name,"w"); 
  $img_content = ""; 
  while(!feof($img_read_fd)){ 
   $img_content .= fread($img_read_fd,1024); 
  } 
  fwrite($img_write_fd,$img_content); 
  fclose($img_read_fd); 
  fclose($img_write_fd); 
  print("[OK] \n"); 
 } 
 return $pic_name; 
} 
  
function main(){ 
/* 待抓取图片的网页地址 */
 $site = "https://iroza.jp/products"; 
 $urls= array(
"/18540"
); 
$text=$site.$urls[0];
print($text."\n");
  
for ($i= 0;$i< count($urls); $i++){
 
   $site_name= $site.$urls[$i]; 
   echo "This Site url is $str_name.<br />"; 
   //print("This Site url is".$site_item."\n");
   //print("This Site url is".$urls."\n");

   $img_url = get_img_url($site_name); 
   $img_url_revised = revise_site($img_url, $site_name); 
   $img_url_unique = array_unique($img_url_revised); //unique array 
   $picname=get_pic_file($img_url_unique,"");
   
    preg_match('/<meta name=\"keywords\"(.*?)>/',$site_name,$match);
    $name = str_replace("<meta name=\"keywords\" content=\"","",$match[0]);
    print($name."\n");
    $newname=str_replace(",IROZA,イロザ\">","",$name);
   rename($picname,$newname);
    
   }

} 
  
main(); 
?>