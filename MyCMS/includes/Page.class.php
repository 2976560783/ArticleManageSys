<?php 
/**
* 分页类
*/
class Page
{
    private $total;
    private $limit;
    private $pageSize;
    private $page;
    private $pageNum;
    function __construct($total,$pageSize)
    {
        $this->total=$total;
        $this->pageSize=$pageSize;
        $this->pageNum=ceil($this->total / $this->pageSize);
        $this->page=$this->setPage();
        $this->limit='limit 0,'.$this->pageSize;
    }
    public function __get($key){
        return $this->$key;
    }
    private function setPage(){
        if (isset($_GET['page']) && preg_match('/^\d+$/',$_GET['page']) && $_GET['page'] >0) {
            return $_GET['page'];
        }else{
            return 1;
        }
    }
    public function pageShow(){
        return $this->pageNum;
    }
}