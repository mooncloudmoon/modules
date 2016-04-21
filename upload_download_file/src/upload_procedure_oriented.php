<?php
function upload_files($fileinfo){
    $upload_path="uploadfiles";
    if(!file_exists($upload_path)){
        mkdir($upload_path,0777,true);
    }
    if(is_array($fileinfo)){
        foreach($fileinfo as $fi){
            if(is_array($fi)){
                if(is_string($fi['name'])){
                    //中文版windows文件名一般采用gbk或者gb2312编码，所以此处文件名需要进行转码
                    move_uploaded_file($fi['tmp_name'],$upload_path."/".mb_convert_encoding($fi['name'],"gbk","utf-8"));
                }else if(is_array($fi['name'])){
                    for($i = 0; $i < count($fi['name']); $i++){
                        move_uploaded_file($fi['tmp_name'][$i],$upload_path."/".mb_convert_encoding($fi['name'][$i],"gbk","utf-8"));
                    }
                }
            }
        }
    }else{
        return "upload error";
    }
}