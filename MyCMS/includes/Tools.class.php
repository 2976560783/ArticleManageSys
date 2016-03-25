<?php 
/**
* 常用工具类
*/
class Tools
{
    
    function __construct()
    {
        
    }

    //页面跳转
    public static function alertLocation($info,$url){
        if (!empty($info)) {
            echo "<script type='text/javascript'>alert('$info');window.location.href='$url'</script>";
        }else{
            header('Location:'.$url);
            exit();
        }
        
    }

    //返回跳转
    public static function alertBack($info){
        echo "<script type='text/javascript'>alert('$info');history.back();</script>;";

        exit();
    }

    //显示过滤
     static public function htmlString($data){
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                $string[$key]=Tools::htmlString($value);
            }
        }elseif (is_object($data)) {
            $string=new stdClass();
            foreach ($data as $key => $value) {
                $string->$key=Tools::htmlString($value);
            }
        }else{
            $string=htmlspecialchars($data);
        }
        return $string;
    }

    //清空session
    public static function unSession(){
            session_destroy();
    }
}