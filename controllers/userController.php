<?php 

class userController extends baseController {
    
    private $username;
    private $password;
    
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
        $this->login();
    }
    
    public function login() {
        $vars['title'] = 'Please Login';
        $vars['action'] = '/user/process';
        $this->load->view('login', $vars);
    }
    
    public function process() {
        
        if(isset($_POST['submit'])) {
        
            $this->username = $_POST['username'];
            $this->password = md5($_POST['password'] . 'lolol');
            $this->load->model('db');
            
            $where = array(
                'username' => $this->username,
                'password' => $this->password
            );
            
            $result = $this->db->select($where , 'users');
            if($result == false) {
                $error = 'no user';
            } else {
                $error = $result;
            }
            
            echo '<pre>' . print_r($error,1) . '</pre>';
            
        } else {
            $this->login();
        }
    }
    
    public function auth(){
        
    }
    
}

?>