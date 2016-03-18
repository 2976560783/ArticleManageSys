<?php 
/**
* 管理员实体类
*/
class LevelModel extends Model
{
    private $level_name;
    private $level_info;
    private $id;
    private $level_info_flag;
    private $limit;

    public function __set($key,$value){
        $this->$key=$value;
    }

    public function __get($key){
        return $this->$key;
    }

    //查询所有记录数
    public function getLevelCount(){
      $sql="
            SELECT 
                  count(*) as total
            from 
                  admin_level
            ";
        return parent::getCount($sql)[0];
    }
    //查询所有等级
    public function getAllLevel(){
        $sql='select
                    id,
                    level_name,
                    level_info
                from
                     admin_level
                     '.$this->limit.'
                 ';
        return parent::getAll($sql);
    }
    //id查询单个等级
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
    //name查询单个等级
    public function getSingleManage_Name(){
        $sql="select
                    id
                from
                     admin_level
                where 
                   level_name='$this->level_name'
                 ";
        return parent::getOne($sql);
    }
    //增加等级
    public function addLevel(){
        $sql="INSERT INTO admin_level(
                                        level_name,
                                        level_info
                                        )
                                 VALUES (
                                         '$this->level_name', 
                                         '$this->level_info'
                                         )
                                         $this->limit";
        return parent::aud($sql);
    }

    //更新等级
    public function updateLevel(){
        $sql="UPDATE
                    admin_level
                SET 
                    level_name='$this->level_name',
                    level_info='$this->level_info'
                WHERE 
                    id = '$this->id'
                    ";
        $sql_no_level_info="UPDATE
                    admin_level
                SET 
                    level_name='$this->level_name'
                WHERE 
                    id = '$this->id'
                    ";
        return $this->level_info_flag?parent::aud($sql):parent::aud($sql_no_level_info);
    }

    //删除等级
    public function deleteLevel(){
        $sql="DELETE FROM
                         admin_level
                     WHERE
                         id = '$this->id'
                         ";
        return parent::aud($sql);
    }
}