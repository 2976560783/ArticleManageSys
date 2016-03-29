<?php 
namespace Home\Model;
use Think\Model;

/**
* 回复留言模块
*/
class RmsgModel extends Model
{   
    /**
     * 删除主留言回帖
     * @param  Int/array/string $msgId 主留言id
     * @return [type]        [description]
     */
    public function delRmsgByMsgId($msgId){
        $where=array();
        if (!msgId ||empty($msgId)) {
            return false;
        }
        if (is_array($msgId)) {
            $where['msgId']=array('in',implode(',',$msgId));
        }elseif (is_string($msgId)) {
            if (strpos(',',$msgId)) {
                $where['msgId']=array('in',$msgId);
            }else{
                $where['msgId']=$msgId;
            }
            
        }elseif (is_int($msgId)) {
            $where['msgId']=$msgId;
        }
        return $this->where($where)->delete();
    }
    /**
     * 查询主留言的回帖
     * @param  Int/array/string $msgId 主留言id
     * @return [type]        [description]
     */
    public function getRmsgByMsgId($msgId){
        $where=array();
        if (!msgId ||empty($msgId)) {
            return false;
        }
        if (is_array($msgId)) {
            $where['msgId']=array('in',implode(',',$msgId));
        }elseif (is_string($msgId)) {
            if (strpos(',',$msgId)) {
                $where['msgId']=array('in',$msgId);
            }else{
                $where['msgId']=$msgId;
            }
            
        }elseif (is_int($msgId)) {
            $where['msgId']=$msgId;
        }
        return $this->where($where)->select();
    }

    public function getRmsgByRmsgId($id){
        $rmsgTable=D('rmsg');
        return $rmsgTable->getById($id);
    }
    public function reply($msgId,$userId,$content){
        //数据校验
        
        //准备数据
        $data=array();
        $data['msgId']=$msgId;
        $data['userId']=$userId;
        $data['content']=$content;

        //录入数据库
        $this->create($data);
        return $this->add();
    }

    public function edit($where,$data=array()){
        if (empty($where)) {
            return false;
        }
        return $this->where($where)->save($data);
    }

    public function delete($where){
        if (!$where || empty($where)) {
           return false;
        }
         return $this->where($where)->delete();
    }
}