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
        $managers=array();
        $mysqli=DB::getDb();
        $sql='select * from admin_manage';
        $result=$mysqli->query($sql);
        while ($objects=$result->fetch_object()) {
            $managers[]=$objects;
        }
        @DB::unDb($result = null,$mysqli);
        return $managers;
    }

    //查询管理员
    public function getManage(){

    }

    //更新管理员
    public function updateManage(){

    }

    //删除管理员
    public function deleteManage(){

    }
}