<?php
namespace Home\Controller;

use Think\Controller;
use Home\Mode;
/**
* 
*/
class MsgController extends Controller
{
    public function addMsg(){
        if (IS_POST) {
            $msgTable=D('msg');
            $data['title']=I('post.title');
            $data['content']=I('post.content');
            $data['userId']=session('loginedUserId');
            $r=$msgTable->addMsg($data);
            if ($r) {
                $this->success('chenggong','/msg/index ');
            }else{
                $this->error('shibai');
            }
        }
        
        if (session('?loginedUser')) {
            $this->assign('view_title','发表留言');
            $this->display();
        }else{
            $this->error('尚未登陆，请先登录','/user/login/');
        }
    }
    public function editMsg(){
        $msgTable=D('msg');
        if (IS_POST) {
            $msgId=I('get.msgId');
            $data['title']=I('post.title');
            $data['content']=I('post.content');
            $r=$msgTable->updateMsg('id='.$msgId,$data);
            if ($r) {
                $this->success('chenggong','/msg/index ');
            }else{
                $this->error('shibai');
            }
        }
        $msgObj=$msgTable->getMsgById(I('get.msgId'));
        if (session('?loginedUser') && session('loginedUserId') == $msgObj['userId']) {
            $this->assign('msgObj',$msgObj);
            $this->assign('view_title','修改留言');
            $this->display();
        }else{
            $this->error('尚未登陆，请先登录','/user/login/');
        }
    }
    public function delMsg(){
        $msgTable=D('msg');
        $r=$msgTable->delMsg('id='.I('get.msgId'));
        if ($r) {
            $this->success('删除成功');
        }else{
            $this->error('失败');
        }
    }
    public function viewMsg(){
        $viewMsgTable=D('msg');
        $msgId=I('get.userid');
        if (!$msg || empty($msgId)) {
            $msgId=1;
        }
        $msg=$viewMsgTable->getMsgById('id');
        $this->assign('msg',$msg);
        $this->assign('view_title',$msg['title']);
    }
    public function index(){
        $user=D('User');
        $r=$user->getMsgByPage();
        $this->assign('lists',$r['lists']);
        $this->assign('pages',$r['pages']);
        $this->assign('view_title','首页');
        $this->display();
    }
}