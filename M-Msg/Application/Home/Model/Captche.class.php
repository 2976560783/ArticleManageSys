<?php 
namespace Home\Model;
use Think\Verify;

/**
* 验证码相关
*/
class Captche
{
    const REGISTER_CAPTCHE = 1;
    const LOGIN_CAPTCHE =  2;
    function __construct()
    {
        
    }
    public function createCaptche($indentify = self::REGISTER_CAPTCHE){
        $verify=new Verify();
        $verify->length=4;
        $verify->fontsize=30;
        $verify->entry($indentify);
    }
    public function checkCaptche($code,$indentify = self::REGISTER_CAPTCHE){
        $verify=new Verify();
        return $verify->check($code,$indentify);
    }
}