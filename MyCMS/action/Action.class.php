<?php 
/**
* 操作控制器
*/
class Action
{
    protected $tpl;
    protected $manage;
    protected $level;
    function __construct(&$tpl,&$manage)
    {
        $this->tpl=$tpl;
        $this->manage=$manage;
        $this->level=$manage;
    }
}