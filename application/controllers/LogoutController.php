<?php
class LogoutController extends Zend_Controller_Action
{

    
    public function indexAction()
    {
        // action body
       Zend_Session::destroy(true);
       $this->_redirect("/Login");
    }
    
}





