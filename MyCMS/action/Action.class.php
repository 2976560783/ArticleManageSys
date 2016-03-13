<?php 
/**
* 
*/
class Action
{
    protected $tpl;
    protected $manage;
    function __construct(&$tpl,&$manage)
    {
        $this->tpl=$tpl;
        $this->manage=$manage;
    }
}