<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>会员系统</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
    function __autoload($_className){
        require $_className.'.class.php';
    }
    if (isset($_GET['index'])) {
        $main=new Main($_GET['index']);
    }else{
        $main=new Main;
    }
    $main->run();
    
    
 ?>
</body>
</html>