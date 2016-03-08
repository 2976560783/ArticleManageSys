<?php
mysql_connect('localhost','root','');
mysql_select_db('article_data');
mysql_query('set names utf8');
    $sql="select * from article"; //按发布时间排序
   $ok= mysql_query($sql);  //返回结果表示符

if($ok && mysql_num_rows($ok)){
    while($row=mysql_fetch_assoc($ok)){
        $data[]=$row;   //自动赋下标，$data为二维数组，每个元素也为关联数组
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文章管理</title>
    <style type="text/css">
        @import url(../css/styl.css);
    </style>
    <script type="text/javascript" src="../js/load.js">
    </script>
</head>
<body>
<div id="contain">
    <div id="top">
        <img src="../img/book.png" height="80px">
        <h1 align="center">后台管理页面</h1>
    </div>
    <div id="bottom1">
        <div id="left">
            <br><br>
            <a href="article.add.php" style="font-size: 25px;">发布文章</a>
            <br><br>
            <a href="article.manage.php" style="font-size: 25px;">管理文章</a>
        </div>
        <div id="right">
                <table id="man" width="1100" border="1p #EFEFEF" cellspacing="0" cellpadding="7px">
                    <tr >
                        <th  id="fir" colspan="3" style="color:#055A85; font-size: 30px">文章管理列表</th>
                    </tr>
                    <tr style="color: #7CA9CA;font-size: 30px;">
                        <th>编号</th>
                        <th>标题</th>
                        <th>操作</th>
                    </tr>
                    <?php
                        if(!empty ($data)) {
                            foreach ($data as $value){


                    ?>
                    <tr>
                        <th><?php echo $value['id']?></th>
                        <th><?php echo $value['title']?></th>
                        <th ><a href="article.del.handle.php?id=<?php echo $value['id']?>">删除</a>
                            <a href="article.modify.php?id=<?php echo $value['id']?>">修改</a>
                        </th>
                    </tr>
                            <?php }
                        }?>
                  <!--  <tr>
                        <th><?php /*echo $value['id']*/?></th>
                        <td>
                            <?php /*echo $value['title']*/?>
                        </td>
                        <td><a href="article.del.handle.php?id=<?php /*echo $value['id']*/?>">删除</a>
                            <a href="article.modify.php?id=<?php /*echo $value['id']*/?>">修改</a></td>
                    </tr>
                    <tr>
                        <th><?php /*echo $value['id']*/?></th>
                        <td>
                            <?php /*echo $value['title']*/?>
                        </td>
                        <td><a href="article.del.handle.php?id=<?php /*echo $value['id']*/?>">删除</a>
                            <a href="article.modify.php?id=<?php /*echo $value['id']*/?>">修改</a></td>
                    </tr>-->
                </table>
        </div>

    </div>
</div>
<div id="bottom2">
    <p align="center">Copyright © 2015 imooc.com All Rights Reserved | 京ICP备 13046642号-2
    </p>

</div>
</div>
</body>
</html>