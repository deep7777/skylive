<?php

class Application_Model_Mail extends Zend_Custom_Dbcomponent
{
    public $body,$from,$to,$subject,$fname,$tname,$db,$config;

	public function __construct(){
        $this->body = 'This is the text of the mail.';
        $this->from = 'deep.7178@gmail.com';
        $this->fname = 'Deepak';
        $this->tname = 'Saheb';
        $this->to = 'deep.7178@gmail.com';
        $date = Zend_Date::now();
        $this->subject = 'TestSubject'.$date;
        $this->config = new Zend_Config(
                    array(
                        'database' => array(
                            'adapter' => 'Mysqli',
                            'params'  => array(
                                'host'     => Zend_Registry::get('config')->db->host,
                                'username' => Zend_Registry::get('config')->db->username,
                                'password' => Zend_Registry::get('config')->db->password,
                                'dbname'   => Zend_Registry::get('config')->db->dbname
                            )
                        )
                    )
                );
        $this->db = Zend_Db::factory($this->config->database);

    }
    public function send(){
    	try{
            $this->date = Zend_Date::now();
            $mail = new Zend_Mail();
            $mail->setBodyText($this->body);
            $mail->setFrom($this->from, $this->fname);
            $mail->addTo($this->to, $this->tname);
            $mail->setSubject($this->subject);
            $mail->send();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    public function sr(){        
        $date = date("Y-m-d");
        $where = " where rdate = '{$date}'";
        $qry = "select * from reminders".$where;
        $deepak = $this->db->query($qry);
        $r = $deepak->fetchAll();
        if($r){
            foreach($r as $key=>$value){
                $date = Zend_Date::now();
                $this->body = "Hi Deepak,please do the task and set the reminder as done";
                echo $this->subject = $r[$key]['rtask'];
                $this->send($this->body,$this->from,$this->to,$this->subject);
            }
        }
    }

}

