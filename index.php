<?php
    // FRONT CONTROLLLER

    // Общие настройки
    ini_set("display_errors",1);
    error_reporting(E_ALL);
    
    session_start();
    
    // Подключаем системные файлы
    define('ROOT', dirname(__FILE__));
    require_once(ROOT.'/components/Autoload.php');
    

    // Вызываем роутер
    $router = new Router();
    $router->run();

