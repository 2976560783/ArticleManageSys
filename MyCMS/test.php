<?php 
// phpinfo();
require dirname(__FILE__).'\init.inc.php';
$vc=new ValidateCode(4);
$vc->doImg();
