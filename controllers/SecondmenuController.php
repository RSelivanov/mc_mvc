<?php

/**
 * Контроллер SecondmenuController
 */
class SecondmenuController
{

    /**
     * Actoin для второго меню
     * @param $part <p>Название части</p>
     * @return view
     */
    public function actionIndex($part)
    {
        switch ($part) {
        case 'general':
            require_once(ROOT . '/views/secondmenu/general.php');
            break;
        case 'server':
            
            if(!empty($_SERVER['REQUEST_URI'])) {
                $uri = trim($_SERVER['REQUEST_URI'], '/');
                $servername = explode("/", $uri);
            }
            
            $servername = $servername[1];
            $servername = ucfirst($servername);
            
            $server = Server::getServer($servername);
            
            require_once(ROOT . '/views/secondmenu/server.php');
            break;
        case 'user':
            // Получаем идентификатор пользователя из сессии
            $userId = User::checkLogged();
            // Получаем информацию о пользователе из БД
            $user = User::getUserById($userId);
            require_once(ROOT . '/views/secondmenu/user.php');
            break;
        }
        return true;
    }
}
