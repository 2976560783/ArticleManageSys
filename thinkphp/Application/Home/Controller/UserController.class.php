<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\Captche;
/**
* 用户控制器
*/
class UserController extends Controller
{
    /**
     * 处理用户注册操作
     * @return [type] [description]
     */
    public function register(){
       if (IS_POST) {
            $userTable = D('user');
            $userName = I('post.userName');
            if (trim($userName) == '') {
                $this->error('用户名不能为空字符串');
            }
            $password =sha1(I('post.password')) ;
            $email = I('post.emial');
            if (!$userTable->doUserRegister($userName,$password,$email)) {
                $this->error($userTable->getError());
            }
            $this->success('注册成功,前往登陆-_-','login');
            
       }else{
        $this->show();
       }
        
    }
    /**
     * 处理用户登录操作
     * @return [type] [description]
     */
    public function login(){
        if (session('?userName')) {
             $this->error('您已经登陆,不能重复登陆!',U('index/index'));
        }else{
            if (IS_POST) {
                $userTable = D('user');
                $userName =I('post.userName');
                $password =sha1(I('post.password')) ;
                $code = I('post.code');
                if (Captche::checkCaptche($code)) {     //验证码是否正确
                     if ($userTable->isExistsUser($userName,$password)) {      //验证用户是否存在
                        session('userName',$userName);
                        $this->success('登陆成功,正在前往首页!',U('index/index'));
                    }else{
                        $this->error('用户名或密码不正确');
                    }
                }else{
                    $this->error('验证码不正确');
                }
            }else{
                $this->assign('title','登陆');
                $this->assign('logined','false');
                $this->assign('userName',session('userName'));
                $this->show();  
            }
        }
    }
    /**
     * 处理用户注销操作
     * @return [type] [description]
     */
    public function logout(){
        session('userName',null);
        $this->success('已退出登陆!','login');
    }
    /**
     * 重置密码
     * @return [type] [description]
     */
    private function resetPwd(){

    }

    public function captche(){
        return Captche::createCaptche();
    }

    private function isValidateUser($userName,$password){

    }

    //处理注册页面ajax验证
    public function ajaxUserName(){
        if (IS_AJAX) {
            $username = I('post.userName');
            $userTable = M('user');
            $count = $userTable->where(array('username'=>$username))->count();
            echo $count;
        }else{
            $this->error('你谁呀，不认识你!');
        }

    }
}