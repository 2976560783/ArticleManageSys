<?php 
/**
* 模板解析类
*/
class Parser
{
    private $content;
    function __construct($tpl_file)
    {
        $this->content=file_get_contents($tpl_file);
        if (!$this->content) {
            exit("模板文件读取失败");
        }
        // echo "读取模板文件成功<br>";
    }

    //解析普通模板变量
    private function parVar($var){
        $patter='/\{\$([\w]+)\}/';
        $repVar=preg_match($patter,$this->content);
        if ($repVar) {
            $this->content=preg_replace($patter,"<?php echo \$this->var['$1']; ?>",$this->content);
        }
    }

    //解析if标签
    private function parIf(){
        $patter_sif='/\{if\s+\$([\w]+)\}/';
        $patter_eif='/\{\/if\}/';
        $patter_else='/\{else\}/';
        if (preg_match($patter_sif,$this->content)) {
            if (preg_match($patter_eif,$this->content)) {
               $this->content=preg_replace($patter_sif, "<?php if(\$this->var['$1']){ ?>", $this->content);
               if (preg_match($patter_else,$this->content)) {
                   $this->content=preg_replace($patter_else,"<?php }else{ ?>",$this->content);
               }
                $this->content=preg_replace($patter_eif, "<?php };?>", $this->content);
            }else{
                echo "if没有结束标签";
            }
            }
        }
    
    //解析注释标签
    private function proConnon(){
        $patter='/\{#\}(.*)\{#\}/';
        if (preg_match($patter,$this->content)) {
            $this->content=preg_replace($patter,"<?php /*$1*/?>",$this->content);
        }
    }

    //解析foreach标签
    private function parForeach(){
        $patter_foreach_start='/\{foreach\s+\$([\w]+)\(\$([\w]+),\$([\w]+)\)\}/';
        $patter_foreach_end='/\{\/foreach\}/';
        $patter_foreach_kv='/\{@([\w]+)([\w\-\>]*)\}/';
        if (preg_match($patter_foreach_start,$this->content)) {
            if (preg_match($patter_foreach_end,$this->content)) {
                $this->content=preg_replace($patter_foreach_start,"<?php foreach(\$this->var['$1'] as \$$2=>\$$3){?>",$this->content);
                if (preg_match($patter_foreach_kv, $this->content)) {
                    $this->content=preg_replace($patter_foreach_kv,"<?php echo \$$1$2;?>",$this->content);
                }
               $this->content=preg_replace($patter_foreach_end,"<?php };?>",$this->content);
            }else{
                exit("未找到foreach的结束标签。");
            }
        }
    }

    //解析include标签
    private function parInc(){
        $patter_inc='/\{include file=[\"\']([\w\.\/]+)[\"\']\}/';
        if (preg_match_all($patter_inc,$this->content,$file)) {
            foreach ($file[1] as $value) {
                if (!file_exists('templates\\'.$value)) {
                    exit("包含文件出错");
                }
                $this->content=preg_replace($patter_inc,"<?php \$tpl->create('$1');?>",$this->content);
            }
        }
    }

    //解析系统标量标签
    private function parConfig(){
        $patter_config='/<!--\{([\w]+)\}-->/';
        if (preg_match($patter_config,$this->content)) {
            $this->content=preg_replace($patter_config,"<?php echo \$this->config['$1'];?>",$this->content);
        }
    }

    //编译并生成编译文件
    public function compile($parser_file,$var){
        $this->parVar($var);
        $this->parIf();
        $this->proConnon();
        $this->parForeach();
        $this->parInc();
        $this->parConfig();
        file_put_contents($parser_file,$this->content);
    }
}