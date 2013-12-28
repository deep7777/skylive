<?php
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
echo "AP=>".APPLICATION_PATH;
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'development'));
echo "\nAE=>".APPLICATION_ENV;
// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

echo "\nApppath=>".APPLICATION_PATH;
date_default_timezone_set('Asia/Calcutta');

/** Zend_Application */
require_once 'Zend/Application.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);
//print_r($application);
// only do bootstrap
//$application->bootstrap()->run();


$application->bootstrap();


// get the options and run CLI
try {
    $m = new Application_Model_Mail();
    if ($m) {
    	//$mail = $m->send();
    	$remider = $m->sr();
        echo "Sent the mail.\n";
    }else{
    	echo "unable to find the class mail";
    }
    
} catch (Zend_Console_Getopt_Exception $e) {
    echo $e->getUsageMessage();
    exit;
} catch (exception $e) {
    echo $e->getMessage();
    exit;
}

?>