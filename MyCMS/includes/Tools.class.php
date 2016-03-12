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
        echo "<script type='text/javascript'>alert('$info');window.location.href='$url'</script>";
    }
    public static function alertBack($info){
        echo "<script type='text/javascript'>alert('$info');history.back();</script>;";

        exit();
    }
}