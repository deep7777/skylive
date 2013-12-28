<?php
require_once "BaseController.php";
class ExpenditureController extends BaseController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::requireLogin();
        $this->menuItemActive("expenditure");
        $this->_helper->layout->enableLayout();
    }

    public function indexAction()
    {
        // action body
    }

    public function meAction()
    {
        // action body
    }


}



