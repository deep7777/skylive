<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    protected function _initAutoload()
	{
		$moduleLoader = new Zend_Application_Module_Autoloader
		(
			array(
			'namespace' => '',
			'basePath' => APPLICATION_PATH
			)
		);		
	}
  
	function _initSysConfig() 
	{
		$sysConfig = new Zend_Config_Ini(APPLICATION_PATH.'/configs/application.ini', APPLICATION_ENV);
		Zend_Registry::set('sysConfig', $sysConfig);
	}
  
	function _initConfig() 
	{
		$config = new Zend_Config_Ini(APPLICATION_PATH.'/configs/project_config.ini',APPLICATION_ENV);
		Zend_Registry::set('config',$config);
	}
  
	public function _initDb()
	{
		$db = Zend_Db::factory('Pdo_Mysql', array(
		'host'     => Zend_Registry::get('config')->db->host,
		'username' => Zend_Registry::get('config')->db->username,
		'password' => Zend_Registry::get('config')->db->password,
		'dbname'   => Zend_Registry::get('config')->db->dbname
		));
		Zend_Db_Table::setDefaultAdapter($db);
		Zend_Registry::set('db',$db);
	}
}

