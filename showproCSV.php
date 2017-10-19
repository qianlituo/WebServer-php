<?php

    require("mysqlconnect.php");
    
    // file name
    $file_path = "export.csv";
 
    // CSV title
    $export_csv_title = array( "productid", "keyword");
 
    // CSV content
    $sql_export = "SELECT product_id,p_name FROM products ";
    $res_export = mysqli_query( $db,$sql_export);
     
    if( touch($file_path) ){
         
        // オブジェクト生成
        $file = new SplFileObject( $file_path, "w" ); 
         
        // タイトル行のエンコードをSJIS-winに変換（一部環境依存文字に対応用）
        foreach( $export_csv_title as $key => $val ){
                 
            $export_header[] = mb_convert_encoding($val, 'SJIS-win', 'UTF-8');
        }
 
        // エンコードしたタイトル行を配列ごとCSVデータ化
        $file->fputcsv($export_header);
         
        while( $row_export = mysqli_fetch_assoc( $res_export ) ){
             
            $export_arr = "";
 
            // 内容行のエンコードをSJIS-winに変換（一部環境依存文字に対応用）
            foreach( $row_export as $key => $val ){
 
                $export_arr[] = mb_convert_encoding($val, 'SJIS-win', 'UTF-8');
            }
             
            // エンコードした内容行を配列ごとCSVデータ化
            $file->fputcsv($export_arr);    
        }
    }
 
?>