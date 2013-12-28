<?php
class LoginController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->_helper->layout->disableLayout();
        $this->config = Zend_Registry::get('config');
        $this->view->config = $this->config;
        $this->view->cssurl=$this->config->common->cssPath;
        $this->view->jsurl=$this->config->common->jsPath;
        $this->view->signin_css = $this->view->cssurl."signin.css";
        $this->view->signin_js = $this->view->jsurl."signin.js";
    }

    public function indexAction()
    {
        // action body
       
    }

    public function processFormAction()
    {
        // action body
        
    }

    public function addAction()
    {
        // action body        
        if ($this->getRequest()->isPost()) {
            $str = file_get_contents("php://input");
            $data = json_decode($str);            
            $usrname = $data->username;
            $upswd = $data->pwd;                
            $upswd = md5($upswd);
            $auth = new Application_Model_Auth();
            $result = $auth->isValidUser($usrname,$upswd);
            if($result){
                $this->setUserSession($usrname);
                $arr = array('msg' => "User is Valid", 'error' => '',"pwd"=>$upswd);
                $jsn = json_encode($arr);
                echo $jsn;
            }else{
                $arr = array('msg' => "", 'error' => 'Invalid User',"pwd"=>$upswd);
                $jsn = json_encode($arr);
                echo $jsn;
            }
        }
        exit;
    }

    public function setUserSession($username){
        $session = new Zend_Session_Namespace('Zend_Auth');
        $session->username = $username;
    }
}