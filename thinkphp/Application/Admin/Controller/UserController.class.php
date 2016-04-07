<?php 
namespace Admin\Controller;

use Think\Controller;

/**
* 后台用户控制器
*/
class UserController extends Controller
{
    public function login(){
        if (!session('?userName')) {
            if (IS_POST) {
            $userTable = D('user');
            $userName = I('post.userName');
            $password = sha1(I('post.password'));
            if ($userTable->isUserExists($userName,$password)) {
                session('userName',$userName);
                $this->success('登陆成功,正在进入后台...',U('index/index'));
            }else{
                $this->error('用户名或密码错误,请重试!');
            }
            }else{
                C('LAYOUT_ON',false);
                $this->show();
            }  
        }else{
            $this->error('您已经登陆,不能重复登陆!',U('index/index'));
        }

    }
    public function logout(){
        if ($_SERVER['HTTP_REFERER'] != 'http://127.0.0.1/thinkphp/index.php/Admin/index/index.html') {
            $this->error('非法操作',U('index/index'));
        }
        session('userName',null);
        $this->success('已安全注销,前往出口!','login');
    }
}
