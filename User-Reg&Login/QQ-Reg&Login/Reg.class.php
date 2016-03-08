<?php 
/**
* 
*/
class Reg extends User
{
    
    function __construct($userName,$password,$notpassword,$email)
    {
       $this->userName=$userName;
       $this->password=$password;
       $this->notpassword=$notpassword;
       $this->email=$email;
    }

    public function querry(){
        $xml=<<<xml
<?xml version="1.0" encoding="UTF-8"?>
<user>
    <userName>$this->userName</userName>
    <password>$this->password</password>
    <email>$this->email</email>
</user>
xml;
        $sex=new SimpleXMLElement($xml);
        $sex->asXML('user.xml');
        Tools::alertLocation('恭喜你，注册成功','?index=login');
    }
    public function check(){
        if ($this->password != $this->notpassword) {
            Tools::alertBack('两次密码输入不一致！请重试！');
        }
        if (strlen($this->password)<6) {
            Tools::alertBack('密码长度至少为6位!');
        }

    }
}