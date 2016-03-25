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
        if (isset($_GET['action'])) {
                    switch ($_GET['action']) {
            case 'add':
                $this->add();
                break;

            case 'delete':
            Validate::sessionCheck();
                $this->delete();
                break;

            case 'show':
            Validate::sessionCheck();
                $this->show();
                break;

            case 'update':
            Validate::sessionCheck();
                $this->update();
                break;

            default:
                Tools::alertBack('非法操作');
                break;
         }
        }else{
            Tools::alertBack('非法操作');
        }
    }

    //添加等级
    public function add(){
        if (isset($_POST['addLevel'])) {
            if (Validate::checkNull($_POST['level_name'])) {
                Tools::alertBack("警告:等级名不能为空!");
            }
            if (Validate::checkLength($_POST['level_name'], 2, 'lt') ||
                 Validate::checkLength($_POST['level_name'], 10, 'gt')) {
                Tools::alertBack("警告:等级名长度不合法!");
            }
            $this->level->level_name=$_POST['level_name'];
            if (Validate::checkNameExists($this->level)) {
                Tools::alertBack("等级名已存在!");
            }
            if (isset($_POST['level_info'])) {
                if ($_POST['level_info'] == '') {
                   $this->level->level_info_flag=false;
                        }else if (Validate::checkNull($_POST['level_info'])) {
                            Tools::alertBack("警告:等级描述不能为空字符串!");
                        }else{
                            $this->level->level_info=$_POST['level_info'];
                        } 
            }
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

    //删除等级
    public function delete(){
        if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
            $this->level->id=$_GET['id'];
            $manage=new ManagesModel();
            $manage->admin_level=$this->level->id;
            if (is_object($manage->getSingleManage()) && !empty($manage->getSingleManage())) {
                Tools::alertBack("此等级正在被管理员使用,暂时无法删除!");
            }
            if (1 == $this->level->deleteLevel()) {
                Tools::alertLocation('删除等级成功！','level.php?action=show');
            }else{
                Tools::alertBack('删除等级失败，请稍后重试!');
            }
        }
        $this->tpl->assign('show',false);
        $this->tpl->assign('delete',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','删除等级');
    }

    //展示全部等级
    public function show(){
        parent::page($this->level->getLevelCount());
        $this->tpl->assign('show',true);
        $this->tpl->assign('update',false);
        $this->tpl->assign('delete',false);
        $this->tpl->assign('add',false);
        $this->tpl->assign('title','等级列表');
        $this->tpl->assign('AllLevels',$this->level->getAllLevel());
    }


    //更新等级
    public function update(){
        if (isset($_POST['updateLevel'])) {
            if (Validate::checkNull($_POST['level_name'])) {
                Tools::alertBack("警告:等级名不能为空!");
            }
            if (Validate::checkLength($_POST['level_name'], 2, 'lt') ||
                 Validate::checkLength($_POST['level_name'], 10, 'gt')) {
                Tools::alertBack("警告:等级名长度不合法!");
            }
            if (isset($_POST['level_info'])) {
                if ($_POST['level_info'] == '') {
                   $this->level->level_info_flag=false;
                        }else if (Validate::checkNull($_POST['level_info'])) {
                            Tools::alertBack("警告:等级描述不能为空字符串!");
                        }else{
                            $this->level->level_info=$_POST['level_info'];
                        } 
            }
            $this->level->level_name=$_POST['level_name'];
            $this->level->id=$_POST['id'];
            $object=$this->level->getSingleLevel();
            if ($object->level_name == $_POST['level_name'] &&
                $object->level_info == $_POST['level_info']) {
                Tools::alertBack("你的信息未修改!");
            }
            if ($object->level_name != $_POST['level_name'] &&
                    Validate::checkNameExists($this->level)) {
                    Tools::alertBack("用户名已经存在");
            }
            if (1 == $this->level->updateLevel() || 0 == $this->level->updateLevel()) {
                Tools::alertLocation('修改等级成功！',$_POST['prev_url']);
            }else{
                Tools::alertBack('修改操作失败,请重试!');
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