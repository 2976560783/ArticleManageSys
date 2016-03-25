<?php 
/**
* 管理员实体类
*/
class ManagesModel extends Model
{
    private $admin_name;
    private $admin_level;
    private $admin_pass;
    private $id;
    private $pass_flag;
    private $limit;
    private $lastIp;

    public function __set($key,$value){
        $mysqli=DB::getDb();
        $this->$key=mysqli_real_escape_string($mysqli,$value);
        @DB::unDb($reult = null,$mysqli);
    }

    public function __get($key){
        return $this->$key;
    }
    //查询所有记录数
    public function getManageCount(){
      $sql="
            SELECT 
                  count(*) as total
            from 
                  admin_manage
            ";
        return parent::getCount($sql)[0];
    }

    //id查询单个管理员
    public function getSingleManage(){
        $sql="select
                    id,
                    admin_name,
                    admin_level
                from
                     admin_manage
                where 
                   id='$this->id'
                or 
                   admin_level='$this->admin_level'
                 ";
        return parent::getOne($sql);
    }
    //用户名查询单个管理员
    public function getSingleManage_Name(){
        $sql="select
                    id
                from
                     admin_manage
                where 
                   admin_name='$this->admin_name'
                 ";
        return parent::getOne($sql);
    }
    //查询所有管理员
    public function getAllManage(){
        $sql="select
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
                    m.admin_level = l.id
                order by 
                      id 
                     $this->limit
                     ";
        return parent::getAll($sql);
    }

    //增加管理员
    public function addManage(){
        $sql="INSERT INTO admin_manage(
                                        admin_name,
                                        admin_level,
                                        admin_pass,
                                        reg_time,
                                        login_count,
                                        last_login_ip,
                                        last_login_time
                                        )
                                 VALUES (
                                         '$this->admin_name', 
                                         '$this->admin_level',
                                         '$this->admin_pass',
                                         now(),
                                         login_count+1,
                                         '$this->lastIp',
                                          now()
                                         )";
        return parent::aud($sql);
    }

    //更新管理员
    public function updateManage(){
        $sql_pass="UPDATE
                    admin_manage 
                SET 
                    admin_pass='$this->admin_pass',
                    admin_level='$this->admin_level'
                WHERE 
                    id = '$this->id'
                    ";
        $sql_nopass="UPDATE
                    admin_manage 
                SET 
                    admin_level='$this->admin_level'
                WHERE 
                    id = '$this->id'
                    ";
        return $this->pass_flag ? parent::aud($sql_pass):parent::aud($sql_nopass);;
    }

    //删除管理员
    public function deleteManage(){
        $sql="DELETE FROM
                         admin_manage
                     WHERE
                         id = '$this->id'
                         ";
        return parent::aud($sql);
    }
    //查询用户登录信息
    public function getLogin(){
      $sql="SELECT
                  m.admin_name,
                  l.level_name
            FROM
                 admin_manage m,
                 admin_level l
            WHERE
                 m.admin_level = l.id 
            AND
                  m.admin_name='$this->admin_name'
            AND
                  m.admin_pass='$this->admin_pass'
                  ";
        return parent::getOne($sql);
    }
    //设置登录信息
    public function setLoginInfo(){
      $sql="UPDATE
                  admin_manage
            SET
                  login_count = login_count+1,
                  last_login_ip = '$this->lastIp',
                  last_login_time = now()
            WHERE 
                  admin_name = '$this->admin_name'
            ";
      return parent::aud($sql);
    }
}