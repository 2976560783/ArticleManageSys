<?php
mysql_connect('localhost','root','');
mysql_select_db('article_data');
mysql_query('set names utf8');
$id=$_GET['id'];
$query=mysql_query("select * from article WHERE id=$id");
$data=mysql_fetch_assoc($query);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>修改文章</title>
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
            <form  id="form1" action="article.modify.handle.php" method="post">
                <input type="hidden" name="id" value="<?php echo $data['id']  ?>">
                <table width="1100" cellspacing="10px">
                    <tr>
                        <th colspan="2" style="color:#055A85; font-size: larger">修改文章</th>
                    </tr>
                    <tr>
                        <th>文章名：</th>
                        <td><input  id="title" name="title" type="text" size="20" value="<?php echo $data['title'] ?>"/></td>
                    </tr>
                    <tr>
                        <th>作者:</th>
                        <td><input type="text" id="author" name="author" size="20" value="<?php echo $data['author']?>"></td>
                    </tr>
                    <tr>
                        <th>简介:</th>
                        <td><label for="description"></label>
                            <textarea name="description" id="description" cols="60" rows="5" res>
                                <?php echo $data['description'] ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>内容:</th>
                        <td><label for="content"></label>
                            <textarea name="content" id="content" rows="15" cols="60">
                                <?php echo $data['content'] ?>
                            </textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right" ><input type="submit" style="font-size: 20px"id="button" name="button" value="提交"></td>
                    </tr>

                </table>
            </form>
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