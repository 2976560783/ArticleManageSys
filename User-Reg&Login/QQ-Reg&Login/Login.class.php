<?php 
/**
* 
*/
class Login extends User
{
    
    function __construct($userName,$password)
    {
       $this->userName=$userName;
       $this->password=$password;
    }

    public function querry(){
        $sex=simplexml_load_file('user.xml');
        if ($this->userName == $sex->userName && $this->password == $sex->password) {
            setcookie('user',$this->userName);
             Tools::alertLocation($this->userName.',欢迎回来！','?index=member');
        }else{
             Tools::alertBack('用户名或者密码错误，登陆失败');
        }
    }
    public function check(){

    }
}