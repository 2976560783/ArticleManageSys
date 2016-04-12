<?php
namespace Admin\Controller;

use Think\Controller;
/**
* 后台视频操做控制器
*/
class VideoController extends Controller
{
    public function index(){
        $this->error('非法操作!',U('index/index'));
    }

    public function addVideo(){
        $classTable = M('class');
        $className = $classTable->getField('class_name',true);
        $this->assign('className',$className);

        $tagTable = M('tag');
        $tagName = $tagTable->getField('tag_name',true);
        $this->assign('tagName',$tagName);

        $areaTable = M('area');
        $areaName = $areaTable->getField('area_name',true);
        $this->assign('areaName',$areaName);

        $languageTable = M('language');
        $languageName = $languageTable->getField('language_name',true);
        $this->assign('languageName',$languageName);

        if (session('?admin')) {
            if (IS_POST) {
                $videoTable = D('video');
                $data = array();
                $data['video_name'] = I('post.videoName');
                if (trim($data['video_name']) == '') {
                    $this->error('视频名称:空字符串!');
                }
                $data['class'] = I('post.className');
                if (!in_array($data['class'], $className)) {
                    $this->error('视频类别:传输参数错误!');
                }
                $data['actors'] = I('post.actors');
                if (trim($data['actors']) == '') {
                    $this->error('演员/主演:空字符串!');
                }
                $data['tag'] = I('post.tagName');
                if (!in_array($data['tag'], $tagName)) {
                    $this->error('内容标签:传输参数错误!');
                }
                $data['area'] = I('post.areaName');
                if (!in_array($data['area'], $areaName)) {
                    $this->error('地区选择:传输参数错误!');
                }
                $data['language'] = I('post.languageName');
                if (!in_array($data['language'], $languageName)) {
                    $this->error('语言选择:传输参数错误!');
                }
                $data['release_time'] = I('post.releaseTime');
                $data['summary'] = I('post.summary');
                if (trim($data['summary']) == '') {
                    $this->error('内容简介:空字符串!');
                }
                $data['score'] = intval(I('post.score'));
                if ($videoTable->addVideo($data)) {
                   $this->success('添加成功,即将进入主界面!&nbsp;&nbsp; <span><a href="addVideo" title="">继续添加</a></span>',U('video/showVideo'),5);
                }else{
                    $this->error($videoTable->getError());
                }
            }else{
                $this->assign('title','添加视频');
                $this->assign('userName',session('admin'));
                $this->show();
            }
        }else{
            $this->error('尚未登陆,非法操作!',U('user/login'));
        }
    }
    public function showVideo($class = ''){
        if (session('?admin')) {
            if (null != (I('get.class'))) {
                $classTable = M('class');
                $className = $classTable->getField('class_name',true);
                if (!in_array(I('get.class'), $className)) {
                    $this->error('视频分类:传输参数错误!');
                }
                $class = I('get.class');
            }
            $videoTable = M('video');
            $p=isset($_GET['p'])?$_GET['p']:0;
            if ($class == '') {
                $list = $videoTable->page($p.','.C('PAGE_SIZE'))->select();
                $count = $videoTable->count();
            }else{
                $list = $videoTable->where(array('class'=>$class))->page($p.','.C('PAGE_SIZE'))->select();
                $count = $videoTable->where(array('class'=>$class))->count();
            }
            $page = new \Think\Page($count,C('PAGE_SIZE'));
            $show = $page->show();
            $this->assign('page',$show);
            $this->assign('pageSize',C('PAGE_SIZE')*(($p-1)<= 0 ? 0:($p-1))+1);
            $this->assign('list',$list);
            $this->assign('title','视频列表');
            $this->assign('dis','#');
            $this->assign('userName',session('admin'));
            $this->show();
        }else{
            $this->error('尚未登陆,非法操作!',U('user/login'));
        }
    }

    public function editVideo(){
        if (session('?admin')) {
            $classTable = M('class');
            $className = $classTable->getField('class_name',true);
            $this->assign('className',$className);

            $tagTable = M('tag');
            $tagName = $tagTable->getField('tag_name',true);
            $this->assign('tagName',$tagName);

            $areaTable = M('area');
            $areaName = $areaTable->getField('area_name',true);
            $this->assign('areaName',$areaName);

            $languageTable = M('language');
            $languageName = $languageTable->getField('language_name',true);
            $this->assign('languageName',$languageName);
            if (IS_POST) {
                $id = I('post.id');
                $videoTable = D('video');
                $data = array();
                $data['video_name'] = I('post.videoName');
                if (trim($data['video_name']) == '') {
                    $this->error('视频名称:空字符串!');
                }
                $data['class'] = I('post.className');
                if (!in_array($data['class'], $className)) {
                    $this->error('视频类别:传输参数错误!');
                }
                $data['actors'] = I('post.actors');
                if (trim($data['actors']) == '') {
                    $this->error('演员/主演:空字符串!');
                }
                $data['tag'] = I('post.tagName');
                if (!in_array($data['tag'], $tagName)) {
                    $this->error('内容标签:传输参数错误!');
                }
                $data['area'] = I('post.areaName');
                if (!in_array($data['area'], $areaName)) {
                    $this->error('地区选择:传输参数错误!');
                }
                $data['language'] = I('post.languageName');
                if (!in_array($data['language'], $languageName)) {
                    $this->error('语言选择:传输参数错误!');
                }
                $data['release_time'] = I('post.releaseTime');
                $data['summary'] = I('post.summary');
                if (trim($data['summary']) == '') {
                    $this->error('内容简介:空字符串!');
                }
                $data['score'] = intval(I('post.score'));
                if ($videoTable->updateVideo($id,$data)) {
                   $this->success('信息修改成功',I('post.pre_url'));
                }else{
                    $this->error("本条信息未修改或修改失败!",I('post.pre_url'));
                }
            }else{
                $id = intval(I('get.id'));
                $videoTable = D('video');
                $data = $videoTable->getVideoById($id);
                $this->assign('data',$data);
                $this->assign('title','编辑信息');
                $this->assign('pre_url',$_SERVER['HTTP_REFERER']);
                $this->assign('userName',session('admin'));
                $this->show();
            }
        }else{
            $this->error('尚未登陆,非法操作!',U('user/login'));
        }
    }

    public function deleteVideo(){
        if (session('?admin')) {
            $id = intval(I('id'));
            $videoTable = M('video');
            $allId = $videoTable->getField('id',true);
            if (!in_array($id, $allId)) {
                $this->error('删除操作:参数错误!');
            }
            if ($videoTable->where(array('id'=>$id))->delete()) {
               $this->success('删除记录成功!');
            }else{
                $this->error($videoTable->getError());
            }
        }
    }
}

