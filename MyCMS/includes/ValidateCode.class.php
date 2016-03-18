<?php 
/**
* 验证码类
*/
class ValidateCode
{
    private $charset;
    private $code;
    private $length;
    private $img;
    private $width;
    private $height;
    private $font;
    private $fontSize;
    private $lineNum;
    function __construct($length)
    {
        $this->length=$length;
        $this->charset='qwertyupasdfghjkzxcvbnmQWERTYUIPLKJHGFDSAZXCVBNM23456789';
        $this->width=150;
        $this->height=100;
        $this->lineNum=8;
        $this->font=ROOT_PATH.'/fonts/comic.ttf';
    }
    private function createCode(){
        $len=strlen($this->charset)-1;
        for ($i=0; $i < $this->length; $i++) { 
            $this->code.=$this->charset[mt_rand(0,$len)];
        }
    }
    private function createCodeBg(){
        $this->img=imagecreatetruecolor($this->width,$this->height);
        $white = imagecolorallocate($this->img, mt_rand(155,255),mt_rand(155,255),mt_rand(155,255));
         imagefilledrectangle($this->img,0,$this->height,$this->width,0,$white);
    }
    private function createText(){
        $this->fontSize=30;
        $x=$this->width/$this->length;
        for ($i=0; $i < $this->length; $i++) { 
            $fontcolor=imagecolorallocate($this->img, mt_rand(0,154),mt_rand(0,154),mt_rand(0,154));
            imagettftext($this->img,$this->fontSize,0,$x*$i+mt_rand(1,5),mt_rand(30,70),$fontcolor,$this->font,$this->code[$i]);
        }
        
    }
    private function createLine(){
        for ($i=0; $i < $this->lineNum; $i++) { 
            $linecolor=imagecolorallocate($this->img, mt_rand(0,154),mt_rand(0,154),mt_rand(0,154));
            imageline($this->img,mt_rand(0,$this->width),mt_rand(0,$this->height),mt_rand(0,$this->width),mt_rand(0,$this->height),$linecolor);
        }
        for ($i=0; $i < 100; $i++) { 
            $linecolor=imagecolorallocate($this->img, mt_rand(200,250),mt_rand(200,250),mt_rand(200,250));
            imagestring($this->img,mt_rand(1,5),mt_rand(0,$this->width),mt_rand(0,$this->height),'',$linecolor);
        }

    }
    private function outPutImg(){
        header("Content-type:image/png");
        imagepng($this->img);
        imagedestroy($this->img);
    }
    public function doImg(){
        $this->createCode();
        $this->createCodeBg();
        $this->createText();
        $this->createLine();
        $this->outPutImg();
    }
}