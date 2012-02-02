<?php

class load {
    
    public function view($name, array $vars = null) {
        $file = SITE_PATH . 'views\\' . $name . 'View.php';
        
        if(is_readable($file)) {
            if(isset($vars)) {
                extract($vars);
            }
            
            
            require($file);
            return true;
        }
    }
    
    public function model($name) {
        $model = $name.'Model';
        $modelPath = SITE_PATH . 'models\\' . $model . '.php';
        
        
        if(is_readable($modelPath)) {
            require($modelPath);
            
            if(class_exists($model)) {
                $registry = Registry::getInstance();
                $registry->$name = new $model;
            } else {
                throw new Exception('no Model class : ' . $model);
            }
        } else {
            throw new Exception('no Model file : ' . $modelPath);
        }
    }
}

?>