<?php 

class testController extends baseController {
    
    private $config;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $conf = new config;
        $this->config = $conf->get('database');
    
        echo '<pre>' . print_r($this->config['host'],1) . '</pre>';
    }
    
    public function rofl() {
        echo '<pre>' . print_r(__METHOD__,1) . '</pre>';
        echo '<pre>' . print_r(func_get_args(),1) . '</pre>';
    }
}

?>