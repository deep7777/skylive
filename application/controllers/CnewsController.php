<?php
require_once "BaseController.php";
class CnewsController extends BaseController
{

    public function init()
    {
        /* Initialize action controller here */
        parent::requireLogin();
        $this->menuItemActive("cnews");
        $this->_helper->layout->enableLayout();        
    }

    public function indexAction()
    {
        // action body
        
		try {
            
                $slashdotRss = Zend_Feed::import('http://www.espncricinfo.com/rss/content/story/feeds/6.xml');
                $channel = array();
                foreach($slashdotRss as $slashdotRss){
                    $channel[] = array(
                    'title'       => $slashdotRss->title(),
                    'link'        => $slashdotRss->link(),
                    'description' => $slashdotRss->description(),
                    'guid'        => $slashdotRss->guid(),
                    'items'       => array()
                    );
                }
                $slashdotRss = Zend_Feed::import('http://static.cricinfo.com/rss/livescores.xml');
                $channel = array();
                foreach($slashdotRss as $slashdotRss){
                    $channel[] = array(
                    'title'       => $slashdotRss->title(),
                    'link'        => $slashdotRss->link(),
                    'description' => $slashdotRss->description(),
                    'guid'        => $slashdotRss->guid(),
                    'items'       => array()
                    );
                }
                $this->view->news = $channel;
                
        } catch (Zend_Feed_Exception $e) {
            // feed import failed
            //echo "Exception caught importing feed: {$e->getMessage()}\n";
            exit;
        }
        
    }


    public function getcricketscoresAction()
    {
        // action body
        // action body     
        $slashdotRss = Zend_Feed::import('http://static.cricinfo.com/rss/livescores.xml');
        $channel = array();
        foreach($slashdotRss as $slashdotRss){
            $channel[] = array(
            'title'       => $slashdotRss->title(),
            'link'        => $slashdotRss->link(),
            'description' => $slashdotRss->description(),
            'guid'        => $slashdotRss->guid(),
            'items'       => array()
            );
        }
        $this->view->news = $channel;
        echo json_encode($channel);
        exit;
    }


}





