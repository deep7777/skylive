<?php
class Zend_Custom_Dbcomponent{
	public $config;
	public $db;
	public function __construct(){
        
		$this->config = new Zend_Config(
                    array(
                        'database' => array(
                            'adapter' => 'Mysqli',
                            'params'  => array(
                                'host'     => Zend_Registry::get('config')->db->host,
                                'username' => Zend_Registry::get('config')->db->username,
                                'password' => Zend_Registry::get('config')->db->password,
                                'dbname'   => Zend_Registry::get('config')->db->dbname
                            )
                        )
                    )
                );
        $this->db = Zend_Db::factory($this->config->database);
	}
}
?>