<?php
require_once "BaseController.php";
class DashboardController extends BaseController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::requireLogin();
        $this->menuItemActive("dashboard");
        $this->_helper->layout->enableLayout();
    }

    public function indexAction()
    {
        // action body
    }


}

