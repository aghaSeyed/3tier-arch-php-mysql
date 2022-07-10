<?php

class Queue {

 protected $_databaseHandler;

 
 public function __construct($databaseHandler) {
  $this->_databaseHandler = $databaseHandler;
 }


 
 public function addItem($query) {
	 $sql ="INSERT INTO queue
       ( query) 
       VALUES (\"".$query ."\")";
	   
    $this->_databaseHandler->query($sql );
    return true;
 }


 
 public function getItem() {
	
  $item = $this->_databaseHandler->query("SELECT * FROM queue WHERE status='queued' LIMIT 1");
  if($item->num_rows == 0){
	  $item = null;
  return $item;}
  else
  return $item->fetch_assoc();
 }
 
};

?>