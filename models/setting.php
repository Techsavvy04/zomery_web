<?php
require_once("../core/db.php");

class seting extends Database
{
    public function __construct()
    {
        parent::__construct(require('../config/config.php'));
    }
    public function GetSetting(){
    	$result = $this -> select()
	    	->from('setting')
	    	->oderBy('id DESC')
            ->execute()
        	->fetch();
        if($result){
        	return $result;
        }else{
        	return False;
        }
    }
}
