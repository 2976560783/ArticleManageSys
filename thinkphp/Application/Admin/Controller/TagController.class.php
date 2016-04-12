<?php
namespace Admin\Controller;

use Think\Controller;

/**
* 标签控制器
*/
class TagController extends Controller
{
    public function index(){
        $this->redirect('showTag','',0);
    }
    public function addTag(){
        if (IS_POST) {
            $tagName = I('post.tagName');
            $tagTable = M('tag');
            if ($tagTable ->create(array('tag_name'=>$tagName))) {
                if ($tagTable->add()) {
                    $this->success('添加标签成功!即将进入标签列表页面...&nbsp;&nbsp; <span><a href="addTag" title="">继续添加</a></span>',U('tag/showTag'),5);
                }else{
                $this->error($tagTable->getError());
                }
            }else{
                $this->error($tagTable->getError());
            }
        }else{
        $this->assign('title','添加标签');
        $this->assign('userName',session('admin'));
        $this->show();
        }

    }
    public function editTag(){
        if (IS_POST) {
            $tagName = I('post.tagName');
            $tagId = I('post.tagId');
            $tagTable = M('tag');
            if ($tagTable ->create(array('id'=>$tagId,'tag_name'=>$tagName))) {
                $count = $tagTable->where(array('id'=>$tagId,'tag_name'=>$tagName))->count();
                if ($count == '1') {
                    $this->success('本条标签未修改');
                }else{
                    if ($tagTable->save()) {
                    $this->success('修改标签成功!即将进入标签列表页面...&nbsp;&nbsp; <span><a href="addTag" title="">继续添加</a></span>',I('post.pre_url'),5);
                }else{
                $this->error($tagTable->getError());
                    }
                }
            }else{
                $this->error($tagTable->getError());
            }
        }else{
        $tagId = intval(I('get.id'));
        $tagTable = M('tag');
        $data = $tagTable->where(array('id'=>$tagId))->select();
        $this->assign('data',$data[0]);
        $this->assign('title','编辑标签');
        $this->assign('pre_url',$_SERVER['HTTP_REFERER']);
        $this->assign('userName',session('admin'));
        $this->show();
        }
    }
    public function showTag(){
        if (session('?admin')) {
            $tagTable = M('tag');
            $p=isset($_GET['p'])?intval($_GET['p']):0;
            $list = $tagTable->page($p.','.C('PAGE_SIZE'))->order('id')->select();
            $count = $tagTable->count();
            $page = new \Think\Page($count,C('PAGE_SIZE'));
            $show = $page->show();
            $this->assign('page',$show);
            $this->assign('pageSize',C('PAGE_SIZE')*(($p-1)<= 0 ? 0:($p-1))+1);
            $this->assign('title','标签列表');
            $this->assign('userName',session('admin'));
            $videoTable = M('video');
            foreach ($list as $key => $value) {
                $count = $videoTable->where(array('tag'=>$value[tag_name]))->count();
                if ($count != '0') {
                   $list[$key]['dis'] = 'dis';
                   
                }
            }
            $this->assign('list',$list);
            $this->show();
        }else{
            $this->error('尚未登陆,非法操作!',U('user/login'));
        }
    }
    public function deleteTag(){
        if (session('?admin')) {
            $tagTable = M('tag');
            $tagId = I('get.id');
            if ($tagTable->where(array('id'=>$tagId))->delete()) {
                $this->success('删除标签成功');
            }else{
                $this->error('删除失败!');
            }
        }

    }

    public function ajaxTagName(){
        if (IS_AJAX) {
            $tagName = I('post.tagName');
            if (trim($tagName) == '') {
                echo '2';
                return;
            }
            $tagTable = M('tag');
            echo $tagTable->where(array('tag_name'=>$tagName))->count();
            // echo 'biaoqian cunzai ';
        }else{
            $this->error('走错地方了。。。');
        }
    }

    public function editAjaxTagName(){
        if (IS_AJAX) {
            $tagId = I('post.tagId');
            $tagName = I('post.tagName');
            $tagTable = M('tag');
            $count = $tagTable->where(array('id'=>$tagId,'tag_name'=>$tagName))->count();
            if ($count == '1') {
                echo "0";
                return;
            }else{
                    $where['id'] = array('NEQ',$tagId);
                    $where['tag_name'] = $tagName;
                    $count = $tagTable->where($where)->count();
                    if ($count != '0') {
                        echo "2";
                        return;
                    }else{
                        echo "1";
                        return;
                    }
                }
        }else{
            $this->error('走错地方了。。。');
        }
    }
}