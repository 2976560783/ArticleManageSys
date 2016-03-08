<?php
mysql_connect('localhost','root','');
mysql_select_db('article_data');
mysql_query('set names utf8');

$sql="select * from article ORDER BY dateline DESC ";

$query=mysql_query($sql);
if($query && mysql_num_rows($query)){
    while($row=mysql_fetch_assoc($query)){
        $data[]=$row;
    }
}
//?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文章列表页</title>
    <link rel="stylesheet" href="../css/list.css">
</head>
<body>
<div id="page">
        <div id="top">
            <div id="top1">
                <br>
                <h1>文章列表页</h1>
                <table align="right" cellspacing="3px">
                    <tr>
                        <th style="font-size: 30px"> <a href="">文章</a></th>
                        <th style="font-size: 30px"><a href="">联系我们</a></th>
                        <th style="font-size: 30px"> <a href="">关于我们</a></th>
                    </tr>
                </table>

            </div>
        </div>
    <div id="left">
    <?php
    if(!empty ($data)) {
    foreach ($data as $value) {
    ?>

                <div id="bot">
                    <div id="top2">
                        <br><br><br>
                        <span class="title"><?php echo $value['title'] ?></span>
                        &nbsp;
                        <span style="font-size: 20px; font-family: 黑体;color: #3A88B5">作者：<?php echo $value['author']?></span>
                    </div>
                    <div id="mid">
                        <span style="font-size: 20px; font-family: Latha;color: #3AB588">
                           <?php
                           echo $value['description']?>
                        </span>
                    </div>
                    <div id="view">
                        <span><a id="xax" href="article.show.php?id=<?php echo $value['id'] ?>">查看详细>></a></span>
                    </div>

                </div>
    <?php
     }
    }
    ?>
    </div>
    <div id="right">
        <div id="search">
            <div id="ser">
                <br><br><br>
                  <span>search:</span>
            </div>
            <div id="go">
                <table class="go" cellspacing="0" cellpadding="0">
                    <tr>
                        <td><input  id="text" type="text" size="25" style="height: 30px"></th>
                        <td><button type="submit"  style="height: 40px;width: 50px;font-size: 25px;color: #666699">Go</button></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
</body>
</html>
