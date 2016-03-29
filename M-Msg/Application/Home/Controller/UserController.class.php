<?php
namespace Home\Controller;

use Think\Controller;

/**
* User控制器
*/
class UserController extends Controller
{
    
    function __construct()
    {
        
    }
    public function register(){
        if (IS_POST) {
            $userTable=D('user');
            $userName=I('post.userName');
            $userPwd=I('post.userPwd');
            $imagePath=I('post.imagePath');
            $captche=I('post.captche');
            if (Captche::checkCaptche($captche,Captche::REGISTER_CAPTCHE)) {
                $r=$userTable->doUserReg($userName,$userPwd,$imagePath);
                if ($r) {
                    $this->success("注册成功",'/user/login');
                }else{
                    $this->error('注册失败');
                }
            }else{
                $this->error('验证码不正确',);
            }

        }else{
            $this->assign('view_title','用户注册');
            $this->display();
        }
    }
    public function login(){
        if (IS_POST) {
            $userTable=D('user');
            $userName=I('post.userName');
            $userPwd=I('post.userPwd');
            if ($userTable->isValidateUser($userName,$userPwd)) {
                session('loginedUser',$userName);
                session('loginedUserId',$userTable->getUserIdByUserName($userName));
                $this->success('登陆成功','/user/index');
            }else{
                $this->error('登陆失败,用户名或账号错误');
            }
        }
    }
    public function logout(){
        session('loginedUser',null);
        $this->redirect('/user/index');
    }

    public function resetPass(){
        $userTable=D('user');
        $userName='fuli';
        $userPwd='123';

        $r= $userTable->resetPwd($userName,$oldPwd,$newPwd);
        if ($r) {
            $this->success('修改成功');
        }else{
            $this->error($this->getError());
        }
    }
}