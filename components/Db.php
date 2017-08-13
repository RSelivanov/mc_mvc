<?php

class Db
{
     /**
     * Подключение к бд
     * @param string $db_host <p>DB Host</p>
     * @param string $db_name <p>DB Name</p>
     * @param string $db_port <p>DB Port</p>
     * @param string $db_user <p>DB User</p>
     * @param string $db_password <p>DB Password</p>
     * @return PDO : $db
     */
    public static function getConnection($db_host = '', $db_name = '' , $db_port = '', $db_user = '', $db_password = '')
    {
        $paramsPath = ROOT . '/configs/db_params.php';
        $params = include($paramsPath);
        
        if($db_host == ''){
            $db_host = $params['host'];  
            $db_name  = $params['dbname'];
            $db_port  = $params['dbport'];
            $db_user = $params['user']; 
            $db_password = $params['password'];
        }
        
        $dsn = "mysql:host={$db_host};dbname={$db_name};port={$db_port}";
        $db = new PDO($dsn, $db_user, $db_password);
        
        // Задаем кодировку
        $db->exec("set names utf8");
        return $db;
    }
}