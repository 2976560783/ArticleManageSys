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
    public function page($total){
        $page=new Page($total,PAGE_SIZE);
        $this->manage->limit=$page->limit;
        $this->tpl->assign('pageInfo',$page->pageShow());
        $this->tpl->assign('num',($page->page-1)*PAGE_SIZE);
    }
}