<?php 
namespace Home\Controller;
use Think\Controller;
/**
* 基础控制器
*/
class BaseController extends Controller
{
    function __construct()
    {
        parent::__construct();
        //是否读取cookie
        if (!session('?logined')) {
            if (cookie('uid')) {
                session('sessionid',cookie('sessionid'));
                session('logined',cookie('username'));
                session('uid', cookie('uid'));
            }else{
                $this->redirect('user/login',0);
            }
        }
        if (!session('?logined')) {
            $this->error('尚未登陆，无法操作',U('user/login'));
        }
        $sessionFlag = M('session')->where(array('uid'=>session('uid')))->field('sessionid')->select()[0]['sessionid'];
       if ($sessionFlag != session('sessionid')) {
          $this->error('你的账号已在其他地方登陆,即将注销当前账号!',U('user/logout'));
       }
        $this->assign('tags',$this->getTags());
        $this->assign('count',M('article')->count());
    }

    //获取标签数据
    protected function getTags(){
        return M('tags as t')->field('tagname,count(tagid) as num')->join('left join think_article as a on a.tagid = t.id')->group('t.id')->select();
    }
}