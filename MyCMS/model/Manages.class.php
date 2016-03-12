<?php 
/**
* 管理员实体类
*/
class Manages
{
    private $tpl;
    private $admin_name;
    private $admin_level;
    private $admin_pass;
    private $id;

    public function __construct(&$tpl)
    {
        $this->tpl=$tpl;
        $this->Action();
    }

    private function Action(){
        switch ($_GET['action']) {
            case 'add':
                if (isset($_POST['addManager'])) {
                        $this->admin_name=$_POST['admin_name'];
                        $this->admin_level=$_POST['admin_level'];
                        $this->admin_pass=md5($_POST['admin_pass']);
                  if (1 == $this->addManage()) {
                      Tools::alertLocation('添加管理员成功！', 'manage.php?action=list');
                  }else{
                      Tools::alertBack('很遗憾，添加管理员失败，请重试!');
                  }
                }

                $this->tpl->assign('add',true);
                $this->tpl->assign('list',false);
                $this->tpl->assign('update',false);
                $this->tpl->assign('delete',false);
                $this->tpl->assign('title','添加管理员');

                break;

            case 'delete':
                if (isset($_GET['id'])) {
                    $this->id=$_GET['id'];
                    if (1 == $this->deleteManage()) {
                        Tools::alertLocation('删除操作成功！','manage.php?action=list');
                    }else{
                        Tools::alertBack('删除失败，请稍后重试!');
                    }
                }
                $this->tpl->assign('list',false);
                $this->tpl->assign('delete',true);
                $this->tpl->assign('update',false);
                $this->tpl->assign('add',false);
                $this->tpl->assign('title','删除管理员');
                break;

            case 'list':
                $this->tpl->assign('list',true);
                $this->tpl->assign('update',false);
                $this->tpl->assign('delete',false);
                $this->tpl->assign('add',false);
                $this->tpl->assign('title','管理员列表');
                $this->tpl->assign('AllManagers',$this->getAllManage());
                break;

            case 'update':
                if (isset($_POST['updateManager'])) {
                    $this->id=$_POST['id'];
                    $this->admin_pass=$_POST['admin_pass'];
                    $this->admin_level=$_POST['admin_level'];
                    if (1 == $this->updateManage()) {
                        Tools::alertLocation('修改操作成功！','manage.php?action=list');
                    }else{
                        Tools::alertBack('操作失败,请重试!');
                            }
                    }
                if (isset($_GET['id']) && preg_match('/^\d+$/',$_GET['id'])) {
                    $this->id=$_GET['id'];
                    is_object($this->getSingleManage()) && !empty($this->getSingleManage())
                                                        ?true:Tools::alertBack('传输参数错误');
                    $this->tpl->assign('admin_name',$this->getSingleManage()->admin_name);
                    $this->tpl->assign('id',$this->id);
                    $this->tpl->assign('level',$this->getSingleManage()->admin_level);
                }else{
                    Tools::alertBack('传输参数错误');
                }
                $this->tpl->assign('list',false);
                $this->tpl->assign('update',true);
                $this->tpl->assign('delete',false);
                $this->tpl->assign('add',false);
                $this->tpl->assign('title','修改管理员');
                break;

            default:
                Tools::alertBack('非法操作');
                break;
         }
    }
    //增加管理员
    public function addManage(){
        $sql="INSERT INTO admin_manage(
                                        admin_name,
                                        admin_level,
                                        admin_pass
                                        )
                                 VALUES (
                                         '$this->admin_name', 
                                         '$this->admin_level',
                                         '$this->admin_pass'
                                         )";
       $mysqli=DB::getDb();
       $mysqli->query($sql);
       $affected_rows=$mysqli->affected_rows;
       @DB::unDb($result = null,$mysqli);
       return $affected_rows;
    }

    //查询单个管理员
    public function getSingleManage(){
        $managers=array();
        $mysqli=DB::getDb();
        $sql="select
                    id,
                    admin_name,
                    admin_level
                from
                     admin_manage
                where 
                   id='$this->id'
                 ";
        $result=$mysqli->query($sql);
        $objects=$result->fetch_object() ;
        @DB::unDb($result = null,$mysqli);
        return $objects;
    }

    //查询所有管理员
    public function getAllManage(){
        $managers=array();
        $mysqli=DB::getDb();
        $sql='select
                    m.id,
                    m.admin_name,
                    l.level_name,
                    m.last_login_ip,
                    m.login_count,
                    m.last_login_time,
                    m.reg_time 
                from
                     admin_manage m,
                     admin_level l
                where 
                    m.admin_level = l.level
                order by 
                      id 
                     limit 0,20'
                 ;
        $result=$mysqli->query($sql);
        while ($objects=$result->fetch_object()) {
            $managers[]=$objects;
        }
        @DB::unDb($result = null,$mysqli);
        return $managers;
    }

    //更新管理员
    public function updateManage(){
        $mysqli=DB::getDb();
        $sql="UPDATE
                    admin_manage 
                SET 
                    admin_pass='$this->admin_pass',
                    admin_level='$this->admin_level'
                WHERE 
                    id = '$this->id'
                    ";
        $mysqli->query($sql);
        $affected_rows=$mysqli->affected_rows;
        @DB::unDb($result = null,$mysqli);
        return $affected_rows;
    }

    //删除管理员
    public function deleteManage(){
        $mysqli=DB::getDb();
        $sql="DELETE FROM admin_manage WHERE id = '$this->id'";
        $mysqli->query($sql);
        $affected_rows=$mysqli->affected_rows;
        @DB::unDb($result = null,$mysqli);
        return $affected_rows;
    }
}