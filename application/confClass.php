<?php

class config
{

    private static $_instance;
    private $_storage;

    public static function getInstance()
    {
        if (!self::$_instance instanceof self) {
            self::$_instance = new Registry;
        }
        return self::$_instance;
    }

    public function get($setting) {
        
        include(CONF_FILE);
        
        
        if(array_key_exists($setting, $conf)) {
            
        $return = $conf[$setting];
        return $return;
        
        } else {
            return FALSE;
        }
        
    }



}

?>