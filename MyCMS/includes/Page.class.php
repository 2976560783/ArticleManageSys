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
    private $page_str;
    private $url;
    function __construct($total,$pageSize)
    {
        $this->total=$total;
        $this->pageSize=$pageSize;
        $this->pageNum=ceil($this->total / $this->pageSize);
        $this->page=$this->setPage();
        $this->limit="limit ".($this->page-1)*$this->pageSize.",".$this->pageSize;
    }
    public function __get($key){
        return $this->$key;
    }
    //设置URL
    private function setUrl(){
        $_url=$_SERVER['REQUEST_URI'];
        $par=parse_url($_url);
        if (isset($par['query'])) {
            parse_str($par['query'],$_query);
            unset($_query['page']);
            $this->url=$par['path'].'?'.http_build_query($_query);
        }
    }
    //设置数字分页目录
    private function pageList(){
        for ($i=1; $i <= $this->pageNum; $i++) { 
            $this->page_str.='<a href="'.$this->url.'&page='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
        }
        return $this->page_str;
    }
    //设置当前页
    private function setPage(){
        if (isset($_GET['page']) && preg_match('/^\d+$/',$_GET['page']) && $_GET['page'] >0) {
            if ($_GET['page'] > $this->pageNum) {
                return $this->pageNum;
            }else{
                return $_GET['page'];
            }
        }else{
            return 1;
        }
    }
    //首页
    public function first(){
        return '<a href="'.$this->url.'&page=1">首页</a>&nbsp;&nbsp;';
    }
    //上一页
    public function prev(){
        if ($this->page == 1) {
            return '  <span class="disable">上一页</span>  &nbsp;&nbsp;';
        }
        return '  <a href="'.$this->url.'&page='.($this->page-1).'">上一页</a>  &nbsp;&nbsp;';
    }
    //下一页
    public function next(){
        if ($this->page == $this->pageNum) {
            return '  <span class="disable">下一页</span>  &nbsp;&nbsp;';
        }
        return '  <a href="'.$this->url.'&page='.($this->page+1).'">下一页</a>  &nbsp;&nbsp;';
    }
    //尾页
    public function last(){
        return '  <a href="'.$this->url.'&page='.($this->pageNum).'">尾页</a>  ';
    }

    public function pageShow(){
        $this->setUrl();
        $this->page_str.=$this->first();
        $this->page_str.=$this->prev();
        $this->pageList();
        
        
        $this->page_str.=$this->next();
        $this->page_str.=$this->last();
        return $this->page_str;
    }
}