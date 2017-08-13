<?php
  /*
  ** Configuration file singleton
  */
class Config {
      
    static private $instance;
    private $data;
    private $config_dir = '/configs/general.php';
  
    
    
    private function __construct()
    {
        if(file_exists(ROOT . $this->config_dir))
        {
            $this->data = include(ROOT . $this->config_dir);
        }
        else
        {
            echo 'Config file not exist!';
        }
    }
    
    public static function getInstance()
    {
        if( empty( self::$instance ) )
        {
            self::$instance = new Config();
        }
        return self::$instance;
    }
  
    public function get($name)
    {

        if(isset($this->data[$name]))
        {
            return $this->data[$name];
        } 
        else 
        {
            return(NULL);
        }
    }
    
}