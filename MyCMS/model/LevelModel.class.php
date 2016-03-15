<?php 
/**
* 管理员实体类
*/
class LevelModel extends Model
{
    private $level_name;
    private $level_info;
    private $id;

    public function __set($key,$value){
        $this->$key=$value;
    }

    public function __get($key){
        return $this->$key;
    }

    //查询所有等级
    public function getAllLevel(){
        $sql='select
                    id,
                    level_name,
                    level_info
                from
                     admin_level
                 ';
        return parent::getAll($sql);
    }
    //查询单个管理员
    public function getSingleLevel(){
        $sql="select
                    level_name,
                    level_info
                from
                     admin_level
                where 
                   id='$this->id'
                 ";
        return parent::getOne($sql);
    }


    //增加管理员
    public function addLevel(){
        $sql="INSERT INTO admin_level(
                                        level_name,
                                        level_info
                                        )
                                 VALUES (
                                         '$this->level_name', 
                                         '$this->level_info'
                                         )";
        return parent::aud($sql);
    }

    //更新管理员
    public function updateLevel(){
        $sql="UPDATE
                    admin_level
                SET 
                    level_name='$this->level_name',
                    level_info='$this->level_info'
                WHERE 
                    id = '$this->id'
                    ";
        return parent::aud($sql);
    }

    //删除管理员
    public function deleteLevel(){
        $sql="DELETE FROM
                         admin_level
                     WHERE
                         id = '$this->id'
                         ";
        return parent::aud($sql);
    }
}