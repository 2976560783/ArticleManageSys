<?php 
/**
* 管理员实体类
*/
class LevelModel extends Model
{
    private $admin_name;
    private $admin_level;
    private $admin_pass;
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
                    level_name
                from
                     admin_level
                 ';
        return parent::getAll($sql);
    }
    //查询单个管理员
    public function getSingleManage(){
        $sql="select
                    id,
                    admin_name,
                    admin_level
                from
                     admin_manage
                where 
                   id='$this->id'
                 ";
        return parent::getOne($sql);
    }

    //查询所有管理员
    public function getAllManage(){
        $sql='select
                    m.id,
                    m.admin_name,
                    l.level_name,
                    m.last_login_ip,
                    m.login_count,
                    m.last_login_time,
                    m.reg_time 
                from
                     admin_manage m,
                     admin_level l
                where 
                    m.admin_level = l.id
                order by 
                      id 
                     limit 0,20'
                 ;
        return parent::getAll($sql);
    }

    //增加管理员
    public function addManage(){
        $sql="INSERT INTO admin_manage(
                                        admin_name,
                                        admin_level,
                                        admin_pass
                                        )
                                 VALUES (
                                         '$this->admin_name', 
                                         '$this->admin_level',
                                         '$this->admin_pass'
                                         )";
        return parent::aud($sql);
    }

    //更新管理员
    public function updateManage(){
        $sql="UPDATE
                    admin_manage 
                SET 
                    admin_pass='$this->admin_pass',
                    admin_level='$this->admin_level'
                WHERE 
                    id = '$this->id'
                    ";
        return parent::aud($sql);
    }

    //删除管理员
    public function deleteManage(){
        $sql="DELETE FROM
                         admin_manage
                     WHERE
                         id = '$this->id'
                         ";
        return parent::aud($sql);
    }
}