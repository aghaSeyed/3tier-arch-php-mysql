<?php

class Worker {

 protected $_databaseHandler;
 protected $_queue;


 public function __construct($queue, $databaseHandler) {
  $this->_queue = $queue;
  $this->_databaseHandler = $databaseHandler;
 }

 public function process() {
   $item = $this->_queue->getItem();

   if($item != null){
   $this->_changeItemStatusToProcessing($item['id']);

   try {
	   
     $this->_databaseHandler->query($item['query']);
	    
	   echo "trying ...";
	   echo "</br>";	   
     $this->markItemAsDone($item);
	 echo "Done";  
   } 
   catch (Exception $e) {
     
     $errorMessageText = $e->getMessage();
     //$this->markItemAsFailed($item, $errorMessageText);
 }}
 }

 public function markItemAsBeingProcessed($item) {
	 
   $this->_changeItemStatus($item['id'], 'processing');
 }

 public function markItemAsDone($item) {
   $this->_changeItemStatusToDone($item['id']);
 }

 public function markItemAsFailed($item, $errorMessageText) {
   $this->_changeItemStatus($item['id'], 'failed', $errorMessageText);
 }

 protected function _changeItemStatusToProcessing($itemId, $errorMessageText=null) {
    $this->_databaseHandler->query("UPDATE queue SET 
      `status` =  'processing'  
      WHERE `id` =  $itemId");
 }
 
 protected function _changeItemStatusToDone($itemId) {
    $this->_databaseHandler->query("UPDATE queue SET 
      `status` =  'done'  
      WHERE `id` =  $itemId");
 }
 
};

?>