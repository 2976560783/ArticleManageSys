<?php 
 /**
* 
*/
final class Tools
{
    
    function __construct()
    {
        # code...
    }
    static public function alertLocation($info,$url){
        echo "<script>alert('$info');location.href='$url'</script>";
        exit();
    }
    static public function alertBack($info){
        echo "<script>alert('$info');history.back();</script>";
        exit();
    }
}