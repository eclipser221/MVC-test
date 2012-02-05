<?php 

class user2Controller extends baseController {
    
    private $username;
    private $password;
    private $connection;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->login();
    }
    
    public function login() {
        $vars['title'] = 'Please Login';
        $vars['action'] = '/user2/process';
        $this->load->view('login', $vars);
    }
    
    public function process() {
        
        if(isset($_POST['submit'])) {
        
            $this->username = $_POST['username'];
            $this->password = md5($_POST['password'] . 'lolol');
            $this->load->model('user');
            $this->user2->authUser($this->username, $this->password);
        } else {
            $this->login();
        }
    }
    
    public function auth(){
        
    }
    
}

?>