<?php 
require substr(dirname(__FILE__),0,-7).'\init.inc.php';
if ($_GET['name']) {
    $manage=new ManagesModel();
    $manage->admin_name=$_GET['name'];
        if (Validate::checkNameExists($manage)){
            echo 'y';
        }else{
            echo 'n';
        }
}