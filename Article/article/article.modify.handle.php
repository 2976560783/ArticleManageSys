<?php
mysql_connect('localhost','root','');
mysql_select_db('article_data');
mysql_query('set names utf8');
if(!(isset($_POST['title'])&&(!empty($_POST['title'])))){
    echo "<script>alert('标题不能为空');window.location.href='article.add.php'</script>";
}
$id=$_POST['id'];
$title=$_POST['title'];
$author=$_POST['author'];
$description=$_POST['description'];
$content=$_POST['content'];
$dateline=time();

/*$insert="insert into article(title,author,description,content,dateline) VALUES ('$title','$author','$description','$content',$dateline)";
$ok=mysql_query($insert);*/
$ok="update article set title='$title',author='$author',description='$description',content='$content',dateline='$dateline' WHERE id='$id'";


if($ok){
    echo "<script> alert('修改文章成功！');window.location.href='article.manage.php' </script>";
}
else{
    printf(mysql_error());
    echo"修改文章失败";
}

?>