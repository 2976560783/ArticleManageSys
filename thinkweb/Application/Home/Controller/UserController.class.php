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
                // $data['ip'] = get_client_ip();
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
                $ip = ip2long(get_client_ip());
                $userModel = D('user');
                if (Captche::checkCaptche($code)) {
                    if ($userModel->where($data)->select()) {
                      $loginInfo = $userModel->login($data,$ip);
                        if ($loginInfo) {
                          session('sessionid',$loginInfo['sessionid']);
                          session('logined',$loginInfo['username']);
                          session('uid', $loginInfo['id']);
                          if (null != I('post.keep')) {
                              cookie('username',$loginInfo['username'],3600*24);
                              cookie('sessionid',$loginInfo['sessionid'],3600*24);
                              cookie('uid',$loginInfo['id'],3600*24);
                          }
                        $this->success('登录成功',U('index/index'));
                        }else{
                          $this->error('登陆失败,请稍后重试!');
                        }
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

    public function userInfo(){
      if (session('logined')) {
        //用户基本信息
        $baseInfo = M('user as u')
                                ->where(array('u.id'=>session('uid')))
                                ->field('username,email,birthday,gender,login_count,last_login_ip,last_login_time,count(a.id) as acount,createtime')
                                ->join('think_article as a on u.id = a.uid')
                                ->select()[0];
        //留言信息
        $commentInfo = M('comment as c')
                                ->where(array('c.uid'=>session('uid'),'pid'=>'0'))
                                ->field('title,time,c.content')
                                ->join('think_article as a on c.aid = a.id')
                                ->select();
        //回复我的消息
        $replyToMe = M('comment as c')
                                ->where(array('c.uid'=>session('uid')))
                                ->field('username,cr.content,c.time')
                                ->join('think_comment as cr on cr.pid = c.id')
                                ->join('think_user as u on cr.uid = u.id')
                                ->select();
        //我回复的消息
        $replyFromMe = M('comment as c')
                                ->where('c.uid='.session('uid').' and not c.pid=0')
                                ->field('username,c.content,c.time')
                                ->join('think_comment as cf on cf.id = c.pid')
                                ->join('think_user as u on cf.uid = u.id')
                                ->select();

        $setInfo = M('user')->where('id='.session('uid'))->field('username,imgpath,birthday,email,gender')->select()[0];
        // var_dump($setInfo);
        // var_dump($commentInfo);
        // var_dump($replyToMe);
        // var_dump($replyFromMe);
        $this->assign('baseInfo',$baseInfo);
        $this->assign('commentInfo',$commentInfo);
        $this->assign('replyToMe',$replyToMe);
        $this->assign('replyFromMe',$replyFromMe);
        $this->assign('setInfo',$setInfo);
        $this->show();
      }else{
         $this->redirect('login',0);
      }
    }

    public function setUserInfo(){
        $userModel = M('user');
        $userInfo = $userModel->getField('username,email',true);
        $data = array();
        if (I('post.username') != session('logined')) {
            $ruls['id']=array('neq',session("uid"));
            $ruls['username'] = array('eq',session('logined'));
            if (!$userModel->where($ruls)->count()) {
               $data['username'] = I('post.username');
               var_dump($data['username']);
            }
        }
        // var_dump($userInfo);
        // var_dump(I('post.'));
    }

}