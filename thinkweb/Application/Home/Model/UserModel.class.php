<?php 
namespace Home\Model;

use Think\Model;

/**
*用户名模型类
*/
class UserModel extends Model
{
    protected $_validate = array(
        array('username','require','用户名不能为空字符串'),
        array('username','','用户名已经存在',0,'unique','1'),
        array('password','require','密码不能为空字符串'),
        array('confirmpwd','password','确认密码不正确',0,'confirm'),
        array('email','require','电子邮箱必须填写'),
        array('email','','电子邮箱已被占用',0,'unique',1),
        array('gender','0,1,2','请不要修改性别信息',2,'in'),
        array('birthday','checkBirthday','生日超出可能范围',1,'callback'),
        );
    protected $_auto = array(
        array('password','md5',3,'function'),
        array('createtime','time','','function'),
        // array('ip','ip2long',3,'function'),
        );


    function checkBirthday($value){
        $start = strtotime('1990-1-1');
        $end = NOW_TIME;
        $value_tiem = strtotime($value);
        return $value_tiem >= $start && $value_tiem <= $end;
    }

    public function login($data,$ip){
        $time = time();
        $loginInfo = $this->field('username,id,status,ip,time,last_login_ip')->where($data)->select()[0];
        if ($loginInfo['status'] == '0') {
            if (!M('session')->add(array('uid'=>$loginInfo['id'],'sessionid'=>$time))) {
                return false;
            }
            $this->where(array('id'=>$loginInfo['id']))->save(array('status'=>1));
        }else{
            if (!M('session')->where(array('uid'=>$loginInfo['id']))->save(array('sessionid'=>$time))) {
                  return false;
            }
        }
        if ($loginInfo['last_login_ip'] != $loginInfo['ip']) {
            if (!$this->where('id='.$loginInfo['id'])->save(array('last_login_time'=>$loginInfo['time'],'last_login_ip'=>$loginInfo['ip']))) {
                return false;
            }
        }else{
            if (!$this->where('id='.$loginInfo['id'])->save(array('last_login_time'=>$loginInfo['time']))) {
                return false;
            }
        }
        if (!$this->where('id='.$loginInfo['id'])->save(array('time'=>$time))) {
            return false;
        }
        if ($loginInfo['ip'] != $ip) {
            if (!$this->where('id='.$loginInfo['id'])->save(array('ip'=>$ip))) {
                return false;
            }
        }
        if (!$this->where('id='.$loginInfo['id'])->setInc('login_count')) {
            return false;
        }
        $loginInfo['sessionid'] = $time;
        return $loginInfo;
    }
}