<?php

class AuthController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
    }

    public function loginAction()
    {
        $db = $this->_getParam('db');
 
        $loginForm = new Default_Form_Auth_Login();
 
        if ($loginForm->isValid($_POST)) {
 
            $adapter = new Zend_Auth_Adapter_DbTable(
                $db,
                'users',
                'username',
                'password',
                'MD5(CONCAT(?, password_salt))'
                );
            $username = $loginForm->getValue('username');
            $password = $loginForm->getValue('password');
            $adapter->setIdentity($username);
            $adapter->setCredential($password);
 
            $auth   = Zend_Auth::getInstance();
            $result = $auth->authenticate($adapter);
 
            if ($result->isValid()) {
                $session = new Zend_Session_Namespace('Zend_Auth');
                $session->username = $username;
                $this->_redirect('/');
                return;
            }
        }
 
        $this->view->loginForm = $loginForm;
 
    }


}



