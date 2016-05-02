<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 付立 <674310383@qq.com> 2016-4-24
// +----------------------------------------------------------------------
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $sessionFlag = M('session')->where(array('uid'=>session('uid')))->field('sessionid')->select()[0]['sessionid'];
        if (!session('?logined')) {
            if (cookie('uid')) {
                if ($sessionFlag != cookie('sessionid')) {
                    cookie('sessionid',null);
                    cookie('username',null);
                    cookie('uid',null);
                   $this->redirect('user/login',0);
                }else{
                    session('sessionid',cookie('sessionid'));
                    session('logined',cookie('username'));
                    session('uid',cookie('uid'));
                }
            }else{
                $this->redirect('user/login',0);
            }
        }else{
            if (session('?logined')) {
               if ($sessionFlag != session('sessionid')) {
                  $this->error('你的账号已在其他地方登陆,即将注销当前账号!',U('user/logout'));
               }            
            }
        }
    }

    public function index()
    {
        if (session('?logined')) {
             $articleModel = M('article');
             $p=isset($_GET['p'])?$_GET['p']:0;
             $list = $articleModel->join('think_tags on think_article.tagid = think_tags.id')->field('think_article.id as id,title,summary,tagname,hits')->page($p.','.C('PAGE_SIZE'))->select();
             $count = $articleModel->count();
             $page = new \Think\Page($count,C('PAGE_SIZE'));
             $show = $page->show();
             $this->assign('tags',$this->getTags());
             $this->assign('count',M('article')->count());
             $this->assign('page',$show);
             $this->assign('list',$list);
             $this->assign('index','i');
             $this->show();
        }else{
            $this->display('User:index');
        }
    }

    /**
     * 关于页面
     * @return [type] [description]
     */
    public function about(){
        if (IS_POST) {
            $time = time();
            $info = I('post.info');
            if (M('log')->add(array('time'=>$time,'loginfo'=>$info))) {
                $this->success('添加成功',$_SERVER['HTTP_REFERER']);
            }
        }else{
            $logs = M('log')->field('time,loginfo')->select();
            $this->assign('logs',$logs);
            $this->show();
        }
    }

    /**
     * 修改日志
     * @return [type] [description]
     */
    public function editlog(){
        if (IS_POST) {
            $time = intval(I('post.time'));
            $loginfo = I('post.loginfo');
            if (M('log')->where(array('time'=>$time))->save(array('loginfo'=>$loginfo))) {
               $this->success('修改日志成功','about');
            }else{
                $this->error('修改失败');
            }
        }else{
            $time = intval(I('get.time'));
            $loginfos = M('log')->where('time='.$time)->field('loginfo')->select()[0];
            if ($loginfos == null) {
                $this->error('日志不存在!');
            }
            $loginfos['time'] = $time;
            $this->assign('loginfos',$loginfos);
            $this->show();
        }
    }

    protected function getTags(){
        return M('tags as t')->field('tagname,count(tagid) as num')->join('left join think_article as a on a.tagid = t.id')->group('t.id')->select();
    }
}