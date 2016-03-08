<?php
    mysql_connect('localhost','root','');
    mysql_select_db('article_data');
    mysql_query('set names utf8');
    if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
        echo "<script>alert('标题不能为空');window.location.href='article.add.php'</script>";
    }
    else {


        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $dateline = time();

        $insert = "insert into article(title,author,description,content,dateline) VALUES ('$title','$author','$description','$content',$dateline)";
        $ok = mysql_query($insert);
        if ($ok) {
            echo "<script> alert('文章发布成功！');window.location.href='article.add.php' </script>";
        } else {
            printf(mysql_error());
            echo "插入失败";
        }
    }

?>