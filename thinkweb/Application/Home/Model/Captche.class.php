<?php 
/**
* 验证码模型
*/
namespace Home\Model;
use Think\Verify;
class Captche
{
    public static function createCaptche(){
        $verify = new Verify();
        $verify->length = C('captcha_length');
        $verify->entry();
    }
    public static function checkCaptche($captche){
        $verify = new Verify();
        return $verify->check($captche);
    }
}