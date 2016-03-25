<?php 
require substr(dirname(__FILE__),0,-7).'\init.inc.php';
$vc=new ValidateCode(4);
$vc->doImg();
$_SESSION['code']=$vc->getCode();
echo $_SESSION['code'];