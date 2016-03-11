<?php 
/**
* 管理员实体类
*/
class Manages
{
    
    function __construct()
    {
            
    }

    //增加管理员
    public function addManage(){
        
    }

    //查询管理员
    public function getManage(){
        $managers=array();
        $mysqli=DB::getDb();
        $sql='select
                    m.id,
                    m.admin_user,
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
                     limit 0,10'
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

    }

    //删除管理员
    public function deleteManage(){

    }
}