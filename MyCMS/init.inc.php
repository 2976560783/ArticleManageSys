<?php 
header('Content-Type:text/html;charset=utf-8');
define('ROOT_PATH', dirname(__FILE__));
require 'cache.inc.php';
require ROOT_PATH.'\includes\Templates.class.php';
require ROOT_PATH.'\config\profile.inc.php';
$tpl=new Templates();