<?php

// Define path to application directory
defined('APPLICATION_PATH')|| define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
    

// Define application environment
defined('APPLICATION_ENV')|| define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
    

defined('SERVER_PROTOCOL')|| define('SERVER_PROTOCOL',"http");
    
defined('SERVER_ROOT')|| define('SERVER_ROOT',$_SERVER['SERVER_NAME']);
  
defined('DOCUMENT_ROOT')||define('DOCUMENT_ROOT',$_SERVER['DOCUMENT_ROOT']);
  
    
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';  

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV, 
    APPLICATION_PATH . '/configs/application.ini'
);
$application->bootstrap()
            ->run();