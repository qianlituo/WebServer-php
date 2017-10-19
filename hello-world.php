
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

    //过滤所有的img
    $url = "https://iroza.jp/products/21749";
    $str = file_get_contents($url);
    $preg = '/<img[^>]*\/>/';
    preg_match_all($preg, $str, $matches);
    $matches = $matches[0];

    //获取src中的链接
    $arr = [];
    foreach($matches as $v){
        $preg = '/http:\/\/\/.*.jpeg/';
        preg_match_all($preg, $v, $match);
        $arr[] = $match[0][0];
    }
    //文件保存地址
    $dir = '~/workspace';

    foreach($arr as $k => $v){
        //图片名称
        $name = $dir . $k . '.jpeg';
        //下载
        download($name, $v);
    }
    function download($name, $url){
        if(!is_dir(dirname($name))){
            mkdir(dirname($name));
        }
        $str = file_get_contents($url);
        file_put_contents($name, $str);
        //输出一些东西,要不窗口一直黑着,感觉怪怪的
        echo strlen($str);
        echo "\n";
    }

?>