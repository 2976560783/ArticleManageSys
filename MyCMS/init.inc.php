<?php 
header('Content-Type:text/html;charset=utf-8');
define('ROOT_PATH', dirname(__FILE__));
require 'cache.inc.php';
require ROOT_PATH.'\config\profile.inc.php';
function __autoload($className){
    if (substr($className,-6) == 'Action') {
        require ROOT_PATH.'\action\\'.$className.'.class.php';
    }elseif (substr($className,-5) == 'Model') {
        require ROOT_PATH.'\model\\'.$className.'.class.php';
    }else{
        require ROOT_PATH.'\includes\\'.$className.'.class.php';
    }
}
$tpl=new Templates();