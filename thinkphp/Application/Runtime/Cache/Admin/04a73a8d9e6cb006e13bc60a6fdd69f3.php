<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理</title>
    <link href="http://libs.baidu.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
    <script src="http://libs.baidu.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/thinkphp/Public/js/adminManage.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" href="/thinkphp/Public/css/adminIndex.css">
</head>
<body>
    <div class="top">
        <span><?php echo ($title); ?></span>
        <p>当前管理员,<b><?php echo ($userName); ?></b></p>
    </div>
    <hr>
    <div class="main">
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>editTag</title>
    <link rel="stylesheet" href="">
    <script>
        $(document).ready(function() {
            // $('#tag').popover('show');
        var flag = true;
        $('#tag').keyup(function () {
             if ($('#tag').val().length > 1) {
                $('#tag').attr('data-content', '');
                $('#tag').popover('hide');
                $.post('editAjaxTagName', {tagId:$('#tagId').val(),tagName: $('#tag').val()}, function(data, textStatus, xhr) {
                    if (textStatus == 'success') {
                        if (data == '0') {
                           $('#tag').popover('hide');
                            $('#tag').attr('data-content', '标签未修改');
                            flag = false;
                        }else if (data == '2') {
                            $('#tag').attr('data-content', '标签已存在');
                            $('#tag').popover('show');
                            flag = false;
                        }else if(data == '1'){
                            $('#tag').popover('hide');
                            flag = true;
                        }
                    }
                });
             }else{
                $('#tag').popover('hide');
             }
        })
        $('#submit').click(function () {
              if ($('#tag').val().length == 0 ) {
                return false;
              }
              if (!flag) {
                $('#tag').popover('show');
              }
              return flag;
        })
        });
    </script>
</head>
<body id="addTag">
    <form action="editTag" method="post" accept-charset="utf-8">
     <div class="col-lg-4" style="margin: 100px 450px 50px 450px;">
        <div class="input-group">
          <input type="text" class="form-control" id="tag" placeholder="TagName...(2--10)" autofocus="" data-container="body" data-toggle="popover" data-placement="top" data-content="" maxlength="10" minlength="2" value="<?php echo ($data["tag_name"]); ?>" required="" name="tagName">
          <span class="input-group-btn">
            <button class="btn btn-default" id="submit" type="submit">修改!</button>
          </span>
        </div>
      </div>
      <input type="hidden" id="tagId" name="tagId" value="<?php echo ($data["id"]); ?>">
      </form>
      <span style="font-size: 16px; background-color: "><a href="/thinkphp/index.php/index/index" title="">回主界面</a></span>
      <span style="font-size: 16px;"><a href="<?php echo ($pre_url); ?>" title="">回列表页</a></span>
</body>
</html>
    </div>
</body>
</html>