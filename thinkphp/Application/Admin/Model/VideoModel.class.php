<?php 
namespace Admin\Model;

use Think\Model;
/**
* 视频模型
*/
class VideoModel extends Model
{

    public function addVideo($data){
        if ($this->create($data)) {
            if ($this->add($data)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function getVideoById($id){
        $data = $this->where(array('id'=>$id))->select();
        return $data[0];
    }

    public function updateVideo($id,$data){
        if ($this->create($data)) {
            if ($this->where(array('id'=>$id))->save($data)) {
               return true;
            }else{
                return $this->getError();
            }
        }else{
            return $this->getError();
        }
    }
}