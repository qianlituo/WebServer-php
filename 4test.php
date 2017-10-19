  <?php
    //取得指定位址的內容，并储存至 $text
    $text=file_get_contents('https://iroza.jp/products/21749');
    //取得第一个 img 标签，并储存至二维数组 $match 中
    preg_match('/]*>/Ui', $text, $match);
    //打印出match
    print_r($match);
    ?>