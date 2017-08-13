<?php

class Router 
{
    /**
    * Свойство для хранения массива роутов
    * @var array 
    */
    private $routes;
    private $status = false;
    /**
    * Конструктор
    */
    public function __construct() 
    {
        $routechPath = ROOT.'/configs/routes.php';
        $this->routes = include($routechPath);
    }
    
    /**
    * Возвращает строку запроса
    * @return string
    */
    private function getURL(){
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    /**
    * Метод для обработки запроса
    */
    public function run()
    {
        // Получаем строку запроса
        $uri = $this->getURL();

        
        // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
        foreach ($this->routes as $uriPattern => $path){
            
            // Сравниваем $uriPattern и $uri
            if(preg_match("~$uriPattern~", $uri)){
               
                // Получаем внутренний путь из внешнего согласно правилу.
                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                
                // Определить контроллер, action, параметры
                $segments = explode('/', $internalRoute);
                $controllerName = ucfirst(array_shift($segments).'Controller');
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                $parameters = $segments;
                
                // Создать объект, вызвать метод (т.е. action)
                $conttrollerObject = new $controllerName;
            
                /* Вызываем необходимый метод ($actionName) у определенного 
                * класса ($controllerObject) с заданными ($parameters) параметрами
                */
               
                $result = call_user_func_array(array($conttrollerObject, $actionName), $parameters);
                
                // Если метод контроллера успешно вызван, завершаем работу роутера
                if($result != null){
                    $this->status = true;
                    break;
                }
            }
        }
        if($uri === '')
        { 
            $SiteController = new MainController;
            $SiteController->actionIndex();
        }  
        else if($this->status == false) {
            
            echo 'Page not found ! ('.$this->getURL().')';
        }
    }
}
