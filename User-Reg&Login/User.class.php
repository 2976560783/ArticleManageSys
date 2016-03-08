<?php 
/**
* 
*/
abstract class User
{
    protected $userName;
    protected $password;
    protected $notpassword;
    protected $email;

    function __construct()
    {
        # code...
    }

    abstract function querry();
    abstract function check();
}