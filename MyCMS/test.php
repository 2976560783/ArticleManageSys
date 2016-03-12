<?php 
echo date('Y-m-d H:i:s',time()).'</br>';
$admin_name="fuli";
$admin_level=5;
$admin_pass="ffjdlfjds";
        $sql="INSERT INTO admin_manage(admin_name,admin_level,admin_pass) VALUES (
                                                                               '$admin_name',
                                                                                $admin_level,
                                                                               '$admin_pass',
                                                                              
                                                                              )";
echo "$sql";