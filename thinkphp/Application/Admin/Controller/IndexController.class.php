<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        if (session('?admin')) {
            $this->assign('title','后台管理首页');
            $this->assign('userName',session('admin'));
            $this->show();
        }else{
            $this->error('尚未登陆,非法操作!',U('user/login'));
        }
        
    }
}