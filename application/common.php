<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/*
 *
 * curl
 */
define('HTTP', 'http://');
define('DOMAIN', "recruit.zszmr.com");
define('APPID', 'wx21484ca7d1351913');
define('APPSECRET', '693d6ef39b8a341f1015e02d562a8cea');
define('YunPianApiKey', '0acb7f520c75626028c39d88cb652084');

function httpGet($url)
{
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);
    
    $res = curl_exec($curl);
    curl_close($curl);
    
    return $res;
}

function createRandNum($length )
{
   
    $str = "";
    for ($i = 0; $i < $length; $i ++) {
        $str .=  mt_rand(0, 9);
    }
    return $str;
}



function cropOneImage($path, $tgpath, $width = "1920", $height = "400")
{
    if (! strstr($path, "temp")) {
        return $path;
    }
    $tgpathArr = explode("/", $tgpath);
    if ($tgpathArr[count($tgpathArr) - 1] == "") {
        unset($tgpathArr[count($tgpathArr) - 1]);
        $tgpathArr = implode("/", $tgpathArr);
    }
    $datefloder =".".$tgpath;
    if (! file_exists($datefloder)) {

        mkdir($datefloder,600,true);

    }
    $temp_arr = explode("/", $path);
    $fileName = $temp_arr[count($temp_arr) - 1];

    $newimg = $tgpath . "/" . $fileName;
    $image = \think\Image::open("." . $path);
    $image->crop($image->width() > $width ? $width : $image->width(),$image->height() > $height ? $height : $image->height())
    ->save("." . $newimg);
    @unlink(".".$path);
    return $newimg;
}



function transOneImage($path, $tgpath, $width = "", $height = "")
{
    if (! strstr($path, "temp")) {
        return $path;
    }
    $tgpathArr = explode("/", $tgpath);
    if ($tgpathArr[count($tgpathArr) - 1] == "") {
        unset($tgpathArr[count($tgpathArr) - 1]);
        $tgpathArr = implode("/", $tgpathArr);
    }
    $datefloder =".".$tgpath;
    if (! file_exists($datefloder)) {
        mkdir($datefloder);
    } 
    $temp_arr = explode("/", $path);
    $fileName = $temp_arr[count($temp_arr) - 1];
    
    $newimg = $tgpath . "/" . $fileName;
    
    $image = \think\Image::open("." . $path);
    $image->thumb($width==""? $image->width():$width, $height == "" ? $image->height() : $height)
        ->save("." . $newimg);
    @unlink(".".$path); 
    return $newimg;
}

function matchImage($new,$old){
    if($new!=$old){
        unlink(".".$old);
    }
    return $new;
}

function transFile($path){
    if(!strstr($path, "/temp/")){
        return $path;
    }
    $newimg = str_replace("/temp/admin/", "/image/user/", $path);
    $arr=explode('/', $path);
/*     $datefloder = './cert/'.$arr[2];
    if (!file_exists($datefloder)) {
        mkdir($datefloder);
    } */
    if(rename(".".$path, ".".$newimg)) {
        return $newimg;
    }

}

function TransVideo($path){
    if(!strstr($path, "/temp/")){
        return $path;
    }
    $newimg = str_replace("/temp/admin", "/image/admin", $path);
    $arr=explode('/', $path);
    /*     $datefloder = './cert/'.$arr[2];
     if (!file_exists($datefloder)) {
     mkdir($datefloder);
     } */
    if(rename(".".$path, ".".$newimg)) {
        return $newimg;
    }
    
}

function delDir($path){
    $dir = ".".$path;
    if (is_dir($dir)) {
        $dh = opendir($dir);
        while ($file = readdir($dh)) {
            if ($file != "." && $file != "..") {
                $fullpath = $dir . "/" . $file;
                if (!is_dir($fullpath)) {
                    unlink($fullpath);
                } else {
                    deldir($fullpath);
                }
            }
        }
        closedir($dh);
        // 删除当前文件夹：
        if (!rmdir($dir)) {
            exit();
            throw new \Exception("删除文件失败");
        }
    }
}




