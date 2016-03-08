<?php 
/**
* 
*/
class Main
{
    private $index;
    private $send;
    function __construct($index ='')
    {
       $this->index = $index;
       if (isset($_POST['send'])) {
           $this->send=$_POST['send'];
       }
    }
    public function run(){
        $this->ui();
        $this->send();
    }
    private function ui(){
        if (empty($this->index)) {
            $this->index='start';
        }
        if (!file_exists($this->index.'.inc.php')) {
            $this->index='start';
        }
        include $this->index.'.inc.php';
    }
    private function send(){
        if (isset($this->send)) {
           switch ($_POST['send']) {
            case '登陆':
                $this->exec(new Login($_POST['userName'],$_POST['password']));
                break;
            case '注册':
                $this->exec(new Reg($_POST['userName'],$_POST['password'],$_POST['notpassword'],$_POST['email']));
                break;
            default:
                # code...
                break;
            }
        }
    }
    public function exec($class){
        $class->check();
        $class->querry();
    }
}