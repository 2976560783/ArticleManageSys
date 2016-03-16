<?php 
/**
* 信息验证类
*/
class Validate
{
    
    function __construct()
    {
            
    }
    //数据判空
    static public function checkNull($data){
        return (trim($data) == '')?true:false;
    }
    //数据判长
    static public function checkLength($data,$length,$flag){
        $data_length = mb_strlen($data,'utf8');
        switch ($flag) {
            case 'gt':
                return ($data_length > $length)?true:false;
                break;
            case 'lt':
                return ($data_length < $length)?true:false;
                break;
            case 'eq':
                return ($data_length = $length)?true:false;
                break;
        }
    }
    //判断数据一致性
    static public function checkConsistency($data1,$data2){
        return ($data1 === $data2)?true:false;
    }

    //验证用户名是否存在
    static public function checkNameExists($manage){
        return ($manage->getSingleManage_Name())?true:false;
    }
}