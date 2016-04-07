<?php 
namespace Admin\Model;

use Think\Model;
/**
* 后台管理员控制器
*/
class UserModel  extends Model
{
    public function isUserExists($userName,$password){
        if ($userName == '' || $password == '') {
            return false;
        }
        $count = $this->where(array('username'=>$userName,'password'=>$password))->count();
        return $count === '1';
    }
}