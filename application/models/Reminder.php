<?php

class Application_Model_Reminder extends Zend_Custom_Dbcomponent
{
	protected $_name = 'reminders';
    public function add($data){
    	try{            
            $this->_name = 'reminders';
			$addedId = $this->db->insert('reminders',$data);
			return $addedId;            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function getReminders(){    
        $qry = "SELECT * FROM  `reminders` ORDER BY  `reminders`.`rdate` ASC ";
        $stmt = $this->db->query($qry);
        $result = $stmt->fetchAll();        
        return $result;
    }

    public function delreminderrecord($id){
        $this->_name = 'reminders';
        $del = $this->db->delete("reminders","id = '".$id."'");
        return $del;
    }

}

