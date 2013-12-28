<?php

class Application_Model_Auth extends Zend_Db_Table_Abstract
{
    protected $_name = 'users';
    public function getUsers(){
    	$this->_name = 'users';
    	$resultSet = $this->fetchAll();
        return $resultSet;
    }
    public function isValidUser($username,$pwd){
        try{
            $table = new Application_Model_Auth();      
            $rows = $table->fetchAll();        
            $match = false;
            foreach ($rows as $key => $value) {
                $tuser = $rows[$key]["username"];
                $tpwd = $rows[$key]["password"];            
                if(($tuser == $username) && ($tpwd == $pwd)){
                    $match = true;
                }           
            }
            return $match;
        }catch(Exception $e){
            echo $e->getMessage();
        }    	    	
    }
}

