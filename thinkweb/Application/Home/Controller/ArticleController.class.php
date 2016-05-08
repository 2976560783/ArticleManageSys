<?php 
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 付立 <674310383@qq.com> 2016-4-25
// +----------------------------------------------------------------------
namespace Home\Controller;
use Home\Controller\BaseController;

/**
* 文章控制器
*/
class ArticleController extends BaseController
{
    /**
     * 展示文章
     * @return [type] [description]
     */
    public function index(){
        $this->redirect('category','',0);
    }

    public function addArticle(){
        if (IS_POST) {
            var_dump(I('post.content'));
        }else{
             $this->show();
        }
       
    }

    public function editArticle(){

    }
    public function deleteArticle(){

    }

    //文章分类展示
    public function category(){
        $p=isset($_GET['p'])?$_GET['p']:0;
        if (null != I('get.cat')) {
            $cat = I('get.cat');
            $cats = M('tags')->getfield('tagname',true);
            if (!in_array($cat, $cats)) {
                $this->error('分类参数错误!');
            }
            $lists = M('article')->field('think_article.id,u.id as uid,username,title,hits,tagname,publish,think_article.likes,image')->join('think_tags as t on t.id = think_article.tagid')->join('think_user as u on u.id = think_article.uid')->where(array('tagname'=>$cat))->page($p.','.C('C_PAGE_SIZE'))->select();
            $count =  M('article')->join('think_tags as t on t.id = think_article.tagid')->where(array('tagname'=>$cat))->count();
            $this->assign('category',I('get.cat'));
        }else{
            $lists = M('article')->field('think_article.id,username,title,hits,tagname,publish,think_article.likes,image')->join('think_tags as t on t.id = think_article.tagid')->join('think_user as u on u.id = think_article.uid')->page($p.','.C('C_PAGE_SIZE'))->select();
            $count = M('article')->count();
        }
        $page = new \Think\Page($count,C('C_PAGE_SIZE'));
        $show = $page->show();
        $this->assign('page',$show);
        $this->assign('lists',$lists);
        $this->show();
    }

    //文章详情
    public function details(){
            //文章内容
            $articleModel = M('article');
            $id = intval(I('get.artid'));
            if ($id <= 0 || !in_array($id, $articleModel->getField('id',true))) {
                $this->error('传输参数错误!');
            }
            $articleModel->where('id='.$id)->setInc('hits');
            $data = $articleModel->where(array('think_article.id'=>$id))->field('u.id as uid,title,hits,publish,username,tagname,summary,content')->join('think_user as u on think_article.uid = u.id')->join('think_tags as t on think_article.tagid = t.id')->select();
            $nextid = $articleModel->where('id >'.$id)->field('id')->limit(1)->select()[0];
            $previd = $articleModel->where('id <'.$id)->field('id')->order('id desc')->limit(1)->select()[0];
            $data[0]['publish'] = substr($data[0]['publish'],0,10);
            $data[0]['aid'] = $id;
            $this->assign('details',$data[0]);
            $this->assign('next',$nextid['id']);
            $this->assign('prev',$previd['id']);
            //留言内容
            $comments = M('comment as c')->field('username,c.time,imgpath,content,pid,c.id as cid,u.id as uid')->join('think_user as u on c.uid=u.id')->where('c.aid='.$id)->order('c.time desc')->select();
            $this->assign('comments',$comments);
            $this->assign('comments_json',json_encode($comments));
            // var_dump($comments);
            $this->show();
    }

    //文章点赞
    public function like(){
        if (IS_AJAX) {
            $data['uid'] = session('uid');
            $data['aid'] = intval(I('post.aid'));
            if (null != I('post.check')) {
                $info['cur'] = M('like')->where($data)->count() == '1'?'1':'0';
                $info['sum'] = M('article')->where(array('id'=>$data['aid']))->field('likes')->select()[0]['likes'];
                $this->ajaxReturn($info,'json');
            }else{
            $count = M('like')->where($data)->count();
            if ($count == '0') {
                if (M('like')->add($data)) {
                    if (M('article')->where(array('id'=>$data['aid']))->setInc('likes')) {
                        echo "0";
                    }
                }
            }else{
                if (M('like')->where($data)->delete()) {
                    if (M('article')->where(array('id'=>$data['aid']))->setDec('likes')) {
                           echo "1";
                    }
                }
            }
          }
        }
    }

    //添加评论
    public function addComment(){
        if (IS_POST) {
            $content = trim(I('post.comment')) == ''?$this->error('评论不能为空字符串'):trim(I('post.comment'));
            $data = array( 
                'content' => $content, 
                'ip' => ip2long(get_client_ip()), 
                'time' => time(), 
                'pid' => intval(I('post.pid')), 
                'uid' => session('uid'), 
                'aid' => intval(I('post.aid')),
            ); 
            if (M('comment')->add($data)) {
               $this->success('留言添加成功');
            }
        }
    }

    //删除评论
    public function deleteComment(){
            $cid = intval(I('get.cid'));
            if (M('comment')->where('id='.$cid)->delete()) {
               $this->success('删除留言成功');
            }else{
                $this->error('删除失败');
            }
    }
}
