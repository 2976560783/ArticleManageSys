<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        if (session('?userName')) {
            $this->assign('logined','true');
            $this->assign('userName',session('userName'));
            $this->assign('title','首页');
            $this->show();
        }else{
            $this->error('登陆之后更多精彩,前往登陆中。。。。。',U('user/login'));
        }
    }
}