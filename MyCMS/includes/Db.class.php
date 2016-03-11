<?php 
/**
* 
*/
class DB
{
    
    function __construct()
    {
        
    }
    public static function getDb(){
            $mysqli=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
            if (mysqli_connect_errno()) {
                exit('连接错误'.mysqli_connect_errno()) ;
            }
            $mysqli->set_charset('utf8');
            return $mysqli;
     }
     public static function unDb(&$result,&$mysqli){
        if (is_object($result)) {
            $result->free();
            $result=null;
        }
        if (is_object($mysqli)) {
            $mysqli->close();
            $mysqli=null;
        }
     }
     // public static function query(&$db,$tableName,$values){
     //    $db->query('SELECT ')
     // }
}