<?php 
namespace Home\Model;
use Think\Model;
use Think\Page;

/**
* MsgModel
*/
class MsgModel extends Model
{
    
    function __construct()
    {
        
    }
    /**
     * 添加留言
     * @param string $msgTitle   留言标题
     * @param string $msgContent 留言内容
     * @param int $msgUserId  留言作者id
     */
    public function addMsg($msgTitle,$msgContent = '',$msgUserId = null){
        $data=array();
        if (is_array($msgTitle)) {
            $data['title']=$msgTitle['title'];
            $data['content']=$msgTitle['content'];
            $data['userId']=$msgTitle['userId'];
        }elseif (is_string($msgTitle)) {
            if (empty($msgContent) || !$msgUserId) {
                return false;
            }
            $data['title']=$msgTitle;
            $data['content']=$msgContent;
            $data['userId']=$msgUserId;
        }
        return $this->add($data);
    }
    /**
     * 修改留言
     * @param  string|array $where 修改留言的标识
     * @param  array  $data  修改后的内容
     * @return [type]        [description]
     */
    public function updateMsg($where,$data=array()){
        if (empty($where)) {
            return false;
        }
        return $this->where($where)->save($data);
    }
    /**
     * 删除留言
     * @param  string|array $where 删除的标识
     * @return [type]        [description]
     */
    public function delmsg($where){
        if (!$where || empty($where)) {
            return false;
        }
        $id=$this->where($where)->getField('id');
        $rmsgTable=D('rmsg');
        if ($rmsgTable->delRmsgByRid($id)) {
            return $this->where($where)->delete();
        }
        return false;
    }
    /**
     * 根据id查询留言信息
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function getMsgById($id){
        $msg=$this->getById($id);
        $rmsgTable=D('rmsg');
        $msg['rmsg']=$rmsgTable->getRmsgBymsgId($id);
        return $msg;
    }

    public function getMsgByPage(){
        $count=$this->count();
        $page=new page($count,C('pageSize'));
        $page->config('theme',"%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%"
);
        $page->config('prev','上一页');
        $page->config('next','下一页');
        $show=$page->show();
        $msgs=$this->limit($page->firstRow.','.$page->listRows)->select();

        $result=array();
        $result['lists']=$msgs;
        $result['pages']=$show;
        return $result;

    }
}