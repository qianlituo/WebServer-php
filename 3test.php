<?php
    //取得指定位址的內容，并储存至 $text
    $text=file_get_contents('https://iroza.jp/products/32862');
    //去除换行及空白字符（序列化內容才需使用）
    //$text=str_replace(array("/r","/n","/t","/s"), '', $text);
    //取出 div 标签且 id 为 PostContent 的內容，并储存至二维数组 $match 中
    //preg_match('/<p class=\"product-itemName-name\">(.*?)<\/p>/',$text,$match);
   // $text="https://iroza.jp/products/32862";
    preg_match('/<img itemprop=\"image\".*?\"([^\"]*(1_\w*.jpeg)).*?>/',$text,$match);
    //preg_match('/<span class=\"\">(.*?)<span>/',$text,$match);

    //打印出match[0]
    print($match[1]."\n");
    //$name = str_replace("<p class=\"product-itemName-name\">","",$match[0]);
    //$name = str_replace("<meta name=\"keywords\" content=\"","",$match[0]);
    //print($name."\n");
    //$newname=str_replace(",IROZA,イロザ\">","",$name);
    //print($newname."\n");
    ?>