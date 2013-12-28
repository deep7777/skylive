<?php
require_once"BaseController.php";
class MailController extends BaseController
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        try{
            $date = Zend_Date::now();
            $mail = new Zend_Mail();
            $mail->setBodyText('This is the text of the mail.');
            $mail->setFrom('deep.7178@gmail.com', 'Deepak');
            $mail->addTo('deep.7178@gmail.com', 'Saheb');
            $mail->setSubject('TestSubject'.$date);
            $mail->send();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function rmailAction()
    {
        // action body
    }


}



