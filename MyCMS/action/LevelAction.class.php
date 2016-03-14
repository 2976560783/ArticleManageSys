<?php 
/**
* 管理操作控制器
*/
class LevelAction extends Action
{

    function __construct(&$tpl)
    {
        parent::__construct($tpl,new LevelModel());
        $this->action();
        $tpl->display('level.tpl');
    }

    private function action(){
        switch ($_GET['action']) {
            case 'add':
                $this->add();
                break;

            case 'delete':
                $this->delete();
                break;

            case 'show':
                $this->show();
                break;

            case 'update':
                $this->update();
                break;

            default:
                Tools::alertBack('非法操作');
                break;
         }
    }

    //添加等级
    public function add(){
        if (isset($_POST['addLevel'])) {
                $this->level->admin_name=$_POST['level_name'];
                $this->level->admin_level=$_POST['level_info'];
          if (1 == $this->level->addLevel()) {
              Tools::alertLocation('新增等级成功！', 'level.php?action=show');
          }else{
              Tools::alertBack('很遗憾，新增等级失败，请重试!');
          }
        }
        $this->tpl->assign('add',true);
        $this->tpl->assign('show',false);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('title','新增等级');
    }

    //删除管理员
    public function delete(){
        if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
            $this->level->id=$_GET['id'];
            if (1 == $this->level->deleteLevel()) {
                Tools::alertLocation('删除操作成功！','level.php?action=show');
            }else{
                Tools::alertBack('删除失败，请稍后重试!');
            }
        }
        $this->tpl->assign('show',false);
        $this->tpl->assign('delete',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','删除等级');
    }

    //展示全部管理员
    public function show(){
        $this->tpl->assign('show',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','管理员列表');
        $this->tpl->assign('AllLevels',$this->manage->getAllLevel());
    }


    //更新管理员
    public function update(){
        if (isset($_POST['updateLevel'])) {
            $this->level->id=$_POST['id'];
            $this->level->admin_pass=$_POST['admin_pass'];
            $this->level->admin_level=$_POST['admin_level'];
            if (1 == $this->level->updateLevel()) {
                Tools::alertLocation('修改操作成功！','level.php?action=show');
            }else{
                Tools::alertBack('操作失败,请重试!');
                    }
            }
        if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
            $this->level->id=$_GET['id'];
            is_object($this->level->getSingleLevel()) && !empty($this->level->getSingleLevel())
                                                ?true:Tools::alertBack('传输参数错误');
            $this->tpl->assign('level_name',$this->level->getSingleLevel()->level_name);
            $this->tpl->assign('id',$this->level->id);
            $this->tpl->assign('level_info',$this->level->getSingleLevel()->level_info);
        }
        $this->tpl->assign('show',false);
        $this->tpl->assign('update',true);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','修改等级');
    }
}