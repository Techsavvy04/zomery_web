<?php
require_once("../core/db.php");

class User extends Database
{
    public function __construct()
    {
        parent::__construct(require('../config/config.php'));
    }
    public function login(){
    	$result = $this -> select()
	    	->from('users')
	    	->where("taikhoan = :taikhoan and matkhau = :matkhau")
	    	->execute(array (
	    		'taikhoan' => $this -> taikhoan,
	    		'matkhau' => $this -> matkhau
	    	))
        	->fetch();
        if($result){
        	return $result;
        }else{
        	return False;
        }
    }
}
