<?php 
switch ($_GET['action']) {
    case 'addManager':
          $admin_name=$_POST['admin_name'];
          $admin_pass=$_POST['admin_pass'];
          $level=$_POST['level'];
          
          break;
    
    case 'updateManage':
        
        break;
    default:
        # code...
        break;
}
