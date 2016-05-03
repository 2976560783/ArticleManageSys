<?php
namespace Home\Controller;

use Think\Controller;
use Home\Model\Captche;
/**
* 用户控制器
*/
class UserController extends Controller
{
    
    public function index(){
        if (!session('?logined')) {
            $this->show();
        }else{
            $this->success('您已经登陆,请注销后再进行此项操作!',U('index/index'));
        }
        
    }

    public function register(){
            if (IS_POST) {
                $userModel = D('user');
                $data['username'] = trim(I('post.userName'));
                $data['email'] = trim(I('post.email'));
                $data['password'] = trim(I('post.password'));
                $data['confirmpwd'] =trim(I('post.confirmPwd'));
                $data['gender'] = trim(I('post.gender'));
                $data['birthday'] =trim( I('post.birthday'));
                $data['ip'] = get_client_ip();
                if ($userModel->create($data)) {
                    if ($userModel->add()) {
                        $this->success('注册成功,请登录!','login');
                    }else{
                       $this->error($userModel->getError());
                    }
                }else{
                    $this->error($userModel->getError());
                }
            }else{
                 $this->redirect('index',0);
            }
           
    }

    public function login(){
        if (!session('?logined')) {
            if (IS_POST) {
                $data['email'] = trim(I('post.email'));
                $data['password'] = md5(trim(I('post.password')));
                $code = trim(I('post.vcode'));
                $userModel = M('user');
                if (Captche::checkCaptche($code)) {
                    if ($userModel->where($data)->select()) {
                        $sessionid = time();
                        $logInfo = $userModel->field('username,id,status')->where($data)->select()[0];
                        //当前账号状态
                        if ($logInfo['status'] == '0') {
                            if (!M('session')->add(array('uid'=>$logInfo['id'],'sessionid'=>$sessionid))) {
                                $this->error('登陆失败,请重试!');
                            }
                            $userModel->where(array('id'=>$logInfo['id']))->save(array('status'=>1));
                        }else{
                            if (!M('session')->where(array('uid'=>$logInfo['id']))->save(array('sessionid'=>$sessionid))) {
                                 $this->error('登陆失败,请重试!');
                            }
                        }
                        session('sessionid',$sessionid);
                        session('logined',$logInfo['username']);
                        session('uid', $logInfo['id']);
                        if (null != I('post.keep')) {
                            cookie('username',$logInfo['username'],3600*24);
                            cookie('sessionid',$sessionid,3600*24);
                            cookie('uid',$logInfo['id'],3600*24);
                        }
                        $this->success('登录成功',U('index/index'));
                    }else{
                        $this->error('用户名或密码错误!');
                    }
                }else{
                    $this->error('验证码不正确');
                }
            }else{
                $this->assign('login','ok');
                $this->display('index');
            }
        }else{
            $this->error('您已登录,不必重复登陆.',U('index/index'));
        }
    }

    public function logout(){
        if (session('?logined')) {
            $db_session = M('session')->where(array('uid'=>session('uid')))->field('sessionid')->select()[0]['sessionid'];
            //判断是否是当前用户正常注销操作
            if ($db_session == session('sessionid')) {
                if (M('session')->where(array('sessionid'=>session('sessionid')))->delete()) {
                    if (M('user')->where(array('id'=>session('uid')))->save(array('status'=>0))) {
                        session(null);
                        cookie('username',null);
                        cookie('sessionid',null);
                        cookie('uid',null);
                        $this->success('注销成功','login');
                    }else{
                        $this->error('注销失败,请重试!');
                    }
                }else{
                    $this->error('注销失败,请重试!');
                }               
            }else{
                session(null);
                cookie('username',null);
                cookie('sessionid',null);
                cookie('uid',null);
                $this->success('注销成功','login');
            }
        }else{
            $this->error('非法操作!');
        }
    }
    //处理注册页面ajax验证
    public function ajaxUserName(){
        if (IS_AJAX) {
            $userModel = M('user');
            if ($userModel->where(array('username'=>I('post.userName')))->select()) {
                echo "1";
            }else{
                echo "0";
            }
        }else{
            $this->error('你谁呀，不认识你!');
        }
    }

    //生成验证码
    public function captche(){
        return Captche::createCaptche();
    }

    protected function upload(){
        
    }

}