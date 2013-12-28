<?php
require_once "BaseController.php";
class EbayController extends BaseController
{

    public function init()
    {
        /* Initialize action controller here */         
        $this->menuItemActive("ebay");
        $this->_helper->layout->enableLayout();
    }

    public function indexAction()
    {
     
        
    }	


}

