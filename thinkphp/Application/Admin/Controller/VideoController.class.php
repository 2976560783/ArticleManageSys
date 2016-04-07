<?php
namespace Admin\Controller;

use Think\Controller;
/**
* 后台视频操做控制器
*/
class VideoController extends Controller
{
    public function addVideo(){
        if (session('?userName')) {
            $this->assign('title','视频管理');
            $this->assign('userName',session('userName'));
            $this->show();
        }else{
            $this->error('尚未登陆,非法操作!',U('user/login'));
        }
    }
    public function showVideo(){
        $this->show();
    }
}