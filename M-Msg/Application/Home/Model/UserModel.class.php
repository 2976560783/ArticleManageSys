<?php 
namespace Home\Model;
use Think\Model;

/**
 *User模型类
 */
class UserModel extends Model {
    protected $trueTableName = 'user';
    //字段自动验证
    protected $_validate=array(
            array('userName','require','用户名不能为空！'),
            array('userPwd','require','密码不能为空！')
        );
/**
 * 用户注册
 * @param  string $userName  用户名
 * @param  string $userPwd   用户密码
 * @param  string $imagePath 用户头像地址
 * @return [type]            注册结果
 */
    public function doUserReg($userName,$userPwd,$imagePath){
        if (empty($userName) || empty($userPwd)) {
            return false;
        }
        if (empty($imagePath)) {
            $imagePath = '1.jpg';
        }
        if ($this->isUserExists($userName)) {
            return false;
        }
        //向数据库插入数据
        $data['userName']=$userName;
        $data['userPwd']=$userPwd;
        $data['imagePath']=$imagePath;
        if ($this->create($data)) {
            return $this->add($data);
        }else{
            $this->error($this->getError());
            return false;
        }

    }
    /**
     * 判断用户名是否存在
     * @param  string  $userName 用户名
     * @return boolean           查询记录数
     */
    public function isUserExists($userName){
        if (empty($userName)) {
            return false;
        }
        $count= $this->where(array('userName' =>$userName ))->count();
        return 1 === $count;
    }
/**
 * 密码重置
 * @param  string $userName 用户名
 * @param  string $oldPwd   旧密码
 * @param  string $newPwd   新密码
 * @return boolean           修改成功返回true，失败返回false
 */ 
    public function resetPwd($userName,$oldPwd,$newPwd){

        if ($oldPwd == $newPwd) {
            return false;
        }
        if (!$this->isValidateUser($userName,$userPwd)) {
            return false;
        }
        $r=$this->where(array('userName'=>$userName))->setField('userPwd',$userPwd);
        return $r;
    }
    /**
     * 判断用户是否存在
     * @param  string  $userName 用户名
     * @param  string  $userPwd  密码
     * @return boolean           用户存在返回true，否则返回false
     */
    public function isValidateUser($userName,$userPwd){
        $count = $this->where(array('userName'=>$userName,'userPwd'=>$userPwd))->count();
        return 1===$count;
    }

    public function captche($type='register'){
        switch ($type) {
            case 'register':
                Captche::createCaptche(Captche::REGISTER_CAPTCHE);
                break;
            case 'login':
                Captche::createCaptche(Captche::LOGIN_CAPTCHE);
                break;
            default:
                # code...
                break;
        }
    }

    public function getUserIdByUserName($userName){
        return $this->where('userName='.$userName)->getField('id');
    }
}