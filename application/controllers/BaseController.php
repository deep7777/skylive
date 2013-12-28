<?php

class BaseController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->sysConfig = Zend_Registry::get('sysConfig');
		$this->view->sysConfig = $this->sysConfig;
		
		$this->config = Zend_Registry::get('config');
		$this->view->config = $this->config;
		
		$this->db=Zend_Registry::get('db');
		
		//controller and action names
		$this->controllerName = $this->getRequest()->getControllerName();
		$this->view->controllerName = $this->controllerName;
		
		$this->actionName = $this->getRequest()->getActionName();
		$this->view->actionName = $this->actionName;
		
		$this->view->baseurl=$this->config->common->baseUrl."/";
		$this->view->cssurl=$this->config->common->cssPath;
		$this->view->jsurl=$this->config->common->jsPath;

        $this->view->items = "";
        $this->view->dashboard = "";
        $this->view->cnews = "";
        $this->view->expenditure = "";
        
        
    }

    public function menuItemActive($menuitem){
    	$this->view->dashboard = ($menuitem == "dashboard")?"active":"";
    	$this->view->items = ($menuitem == "ebay")?"active":"";
       	$this->view->cnews = ($menuitem == "cnews")?"active":"";
		$this->view->expenditure = ($menuitem == "expenditure")?"active":"";    	
        $this->view->reminder = ($menuitem == "reminder")?"active":"";        
    }

    public function requireLogin(){
    	$nsName = 'Zend_Auth';
        $ns = new Zend_Session_Namespace($nsName);
  		if(!isset($ns->username)){
			$this->_redirect('/Login');
  		}else{
    		$this->view->logged_in_user = $ns->username;
  		}
    }
}