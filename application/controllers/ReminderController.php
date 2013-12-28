<?php
require_once"BaseController.php";
class ReminderController extends BaseController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::requireLogin();
        $this->menuItemActive("reminder");
        $this->_helper->layout->enableLayout();

    }

    public function indexAction()
    {
        // action body
        $lr = new Application_Model_Reminder();
        $this->view->list_results = $lr->getReminders();
    }

    public function addAction()
    {
        // action body
        if ($this->getRequest()->isPost()) {            
            $date = $this->getRequest()->getPost("tdate");
            $task = $this->getRequest()->getPost("rtask");
            list($day,$month,$year) = explode("/",$date);
            $date = $year."-".$month."-".$day;
            $rdata = array("rtask"=>$task,"rdate"=>$date);            
            $add_reminder = new Application_Model_Reminder();            
            $add_reminder->add($rdata);            
        }        
        $this->_redirect("/reminder");
    }

    public function reminderformAction()
    {
        // action body
    }

    public function delreminderAction()
    {
        // action body
        $id = $this->getRequest()->getPost('id');
        $reminder = new Application_Model_Reminder();
        $reminder->delreminderrecord($id);
        exit;
    }


}





