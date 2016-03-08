<?php
mysql_connect('localhost','root','');
mysql_select_db('article_data');
mysql_query('set names utf8');
   $id=$_GET['id'];
    $del="delete from article WHERE id=$id";
    $ok=mysql_query($del);
    if($ok){
        echo "<script> alert('文章删除成功');window.location.href='article.manage.php'</script>";
    }


?>