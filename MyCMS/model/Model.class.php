<?php 
/**
* 模型基类
*/
class Model
{
    //查询单个管理员
    protected function getOne($sql){
        $mysqli=DB::getDb();
        $managers=array();
        $result=$mysqli->query($sql);
        $objects=$result->fetch_object() ;
        @DB::unDb($reult = null,$this->mysqli);
        return Tools::htmlString($objects);
    }
    //查询全部管理员
    protected function getAll($sql){
        $mysqli=DB::getDb();
        $managers=array();
        $result=$mysqli->query($sql);
        while ($objects=$result->fetch_object()) {
            $managers[]=$objects;
        }
        @DB::unDb($result = null,$this->mysqli);
        return Tools::htmlString($managers);
    }
    //增改删操作
    protected function aud($sql){
        $mysqli=DB::getDb();
        $mysqli->query($sql);
        $affected_rows=$mysqli->affected_rows;
        @DB::unDb($result = null,$this->mysqli);
        return $affected_rows;
    }
    //查询所有记录总数
    protected function getCount($sql){
        $mysqli=DB::getDb();
        $result=$mysqli->query($sql);
        $fetch_rows=$result->fetch_row();
        @DB::unDb($result = null,$mysqli);
        return $fetch_rows;
    }
}