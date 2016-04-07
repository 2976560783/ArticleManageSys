<?php 
namespace Home\Model;
use Think\Model;
/**
* User Model
*/
class UserModel extends Model
{
    protected $_validate = array(
        array('username','','帐号名称已经存在！',0,'unique',1)
        );

    public function doUserRegister($username,$password,$email){
        // if (empty($username) || empty($password) || empty($email)) {
        //         return false;
        // }
        $data['username'] = $username;
        $data['password'] = $password;
        $data['email'] = $email;
        if ($this ->create($data)) {
           return $this->add($data);
        }
        return false;
    }
    public function isExistsUser($userName,$password){
        if (empty($userName) || empty($password)) {
            return false;
        }
        $count = $this->where(array('username'=>$userName,'password'=>$password))->count();
        return $count === '1';
    }
}