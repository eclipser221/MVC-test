<?php

class indexModel extends model {
    public function getEntries() {
      $return = array();
      $return[0] = array('title' => 'Hello world');
      $return[1] = array('title' => 'Hello Univers!');  
      
      return $return;
    }
}

?>