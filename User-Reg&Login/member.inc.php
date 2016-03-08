    <h1>欢迎您回来</h1>
    <div class="start">
        <p>欢迎您的归来，[<?php echo isset($_COOKIE['user'])?$_COOKIE['user']:Tools::alertLocation('您还没有登陆，请先登陆！', '?index=login'); ?>]</p>
    </div>