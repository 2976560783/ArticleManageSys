<?php 
/**
* 常用工具类
*/
class Tools
{
    
    function __construct()
    {
        
    }
    public static function alertLocation($info,$url){
        echo '<script type="text/javascript">alert("$info");Location.href="$url";</script>;';
        exit();
    }
    public static function alertBack($info){
        echo '<script type="text/javascript">alert("$info");history.back();</script>;';

        exit();
    }
}