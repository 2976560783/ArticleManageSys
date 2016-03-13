<?php 
/**
* 管理员实体类
*/
class Manages
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
       $mysqli=DB::getDb();
       $mysqli->query($sql);
       $affected_rows=$mysqli->affected_rows;
       @DB::unDb($result = null,$mysqli);
       return $affected_rows;
    }

    //查询单个管理员
    public function getSingleManage(){
        $managers=array();
        $mysqli=DB::getDb();
        $sql="select
                    id,
                    admin_name,
                    admin_level
                from
                     admin_manage
                where 
                   id='$this->id'
                 ";
        $result=$mysqli->query($sql);
        $objects=$result->fetch_object() ;
        @DB::unDb($result = null,$mysqli);
        return $objects;
    }

    //查询所有管理员
    public function getAllManage(){
        $managers=array();
        $mysqli=DB::getDb();
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
                    m.admin_level = l.level
                order by 
                      id 
                     limit 0,20'
                 ;
        $result=$mysqli->query($sql);
        while ($objects=$result->fetch_object()) {
            $managers[]=$objects;
        }
        @DB::unDb($result = null,$mysqli);
        return $managers;
    }

    //更新管理员
    public function updateManage(){
        $mysqli=DB::getDb();
        $sql="UPDATE
                    admin_manage 
                SET 
                    admin_pass='$this->admin_pass',
                    admin_level='$this->admin_level'
                WHERE 
                    id = '$this->id'
                    ";
        $mysqli->query($sql);
        $affected_rows=$mysqli->affected_rows;
        @DB::unDb($result = null,$mysqli);
        return $affected_rows;
    }

    //删除管理员
    public function deleteManage(){
        $mysqli=DB::getDb();
        $sql="DELETE FROM admin_manage WHERE id = '$this->id'";
        $mysqli->query($sql);
        $affected_rows=$mysqli->affected_rows;
        @DB::unDb($result = null,$mysqli);
        return $affected_rows;
    }
}