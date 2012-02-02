<?php

class indexController extends baseController {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $model = $this->load->model('index');
        
        $vars['title'] = 'Dynamic Title';
        $vars['posts'] = $this->index->getEntries();
        $this->load->view('index', $vars);
    }
    
}

?>