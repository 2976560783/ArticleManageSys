<?php 
/**
* 模板类
*/
class Templates
{
    private $var=array();       //保存普通变量
    private $config=array();    //保存系统变量
    function __construct()
    {
        //判断相应目录是否存在
        if (!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE_DIR) ) {
            exit("ERROT:相应目录不存在。");
        }
        //从xml文件中获取系统变量
        $test=simplexml_load_file(ROOT_PATH.'\config\profile.xml');
        $taglib=$test->xpath('/root/taglib');
        foreach ($taglib as $tag) {
            $this->config["$tag->name"]=$tag->value;
        }
    }

    //绑定值变量
    public function assign($var,$value){
        if (isset($var) && !empty($var)) {
            $this->var[$var]=$value;
        }else{
            exit("必须设定模板变量值。");
        }
    }

    //渲染模板并调用编译方法生成缓存文件
    public function display($file){
        //给include进来的tpl传递一个操作对象
        $tpl=$this;
        $tpl_file=TPL_DIR."$file";
        if (!file_exists($tpl_file)) {
            echo "模板文件不存在";
        }
        $parser_file=TPL_C_DIR.md5("$file").$file.'.php';
        $cache_file=CACHE_DIR.md5("$file").$file.'.html';
        if (IS_CACHE) {
            if (file_exists($cache_file) && file_exists($parser_file)) {
                if (filemtime($cache_file)>=filemtime($parser_file) && filemtime($parser_file)>=filemtime($tpl_file)) {
                    include $cache_file;
                    return;
                }
            }
        }
        if (!file_exists($parser_file) || filemtime($parser_file) < filemtime($tpl_file)) {
            require_once ROOT_PATH.'\includes\Parser.class.php';
            $parser=new Parser($tpl_file);
            $parser->compile($parser_file,$this->var);
        }
        include $parser_file;
        if (IS_CACHE) {
            file_put_contents($cache_file,ob_get_contents());
            ob_end_clean();
            include $cache_file;
        }
    }

    //用于模块文件的编译，不生成缓存
    public function create($file){
        $tpl_file=TPL_DIR."$file";
        if (!file_exists($tpl_file)) {
            echo "模板文件不存在";
        }
        $parser_file=TPL_C_DIR.md5("$file").$file.'.php';
        if (!file_exists($parser_file) || filemtime($parser_file) < filemtime($tpl_file)) {
            require_once ROOT_PATH.'\includes\Parser.class.php';
            $parser=new Parser($tpl_file);
            $parser->compile($parser_file,$this->var);
        }
        include $parser_file;
}
    }