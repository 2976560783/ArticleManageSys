<?php
namespace Home\Controller;

use Think\Controller;
/**
* 
*/
class RmsgController extends Controller
{
    
    function __construct()
    {
        
    }
    public function replyRmsg(){
        $msgId=I('get.msgId');
        if (IS_POST) {
                    $rmsgTable=D('rmsg');
                    $content=I('post.content');
                    $userId=session('loginedUserId');
                    $r=$rmsgTable->reply($msgId,$userId,$content);
                    if ($r) {
                        $this->success('chenggong','/msg/index/viewMsg/'.msgId);
                    }else{
                        $this->error('shibai');
                    }
                }
        $rmsgObj=$rmsgTable->getRmsgByMsgId($msgId);
        if (session('?loginedUser')) {
            $msgTable=D('msg');
            $msgObj=$msgTable->getMsgById($msgId);
            $this->assign('rmsgObj',$rmsgObj);
            $this->assign('view_title','发表留言');
            $this->display();
        }else{
            $this->error('尚未登陆，请先登录','/user/login/');
        }
    }
    public function editRmsg(){
        $rmsgTable=D('rmsg');
        if (IS_POST) {
            $rmsgId=I('get.rmsgId');
            $content=I('post.content');
            $r=$msgTable->edit('id='.$rmsgId,$content);
            if ($r) {
                $this->success('chenggong','/msg/index ');
            }else{
                $this->error('shibai');
            }
        }
        $rmsgId=I('get.rmsgId');
        if (session('?loginedUser') && session('loginedUserId') == $rmsgTable->where('rmsgId='.$rmsgId)->getField('userId')) {
            $this->assign('content',$rmsgTable->where('rmsgId='.$rmsgId)->getField('content'));
            $this->assign('rmsgId',$rmsgId)
            $this->assign('view_title','修改留言');
            $this->display();
        }else{
            $this->error('尚未登陆，请先登录','/user/login/');
        }
    }
    public function delRmsg(){
        $rmsgTable=D('rmsg');
        $rmsg=$rmsgTable->getRmsgByRmsgId(I('get.rmsgId'));
        $r=$rmsgTable->delete('id='.I('get.rmsgId'));
        if ($r) {
            $this->success('info','/user/viewMsg/'.$rmsg['msgId']);
        }else{
            $this->error($this->getError());
        }
    }
}