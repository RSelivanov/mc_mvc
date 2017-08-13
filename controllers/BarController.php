<?php

/**
 * Контроллер BarController
 */
class BarController
{

    /**
     * Action для главной страницы
     */
    public function actionIndex()
    {
        // Получаем идентификатор пользователя из сессии
        $userId = User::checkLogged();

        // Получаем информацию о пользователе из БД
        $user = User::getUserById($userId);
        
        // Получаем информацию о сервере
        $servers = Server::getServers();
        
        // Пингуем сервер для мониторинга
        if(Config::getInstance()->get('servers_status')){
            $n = 0;
            foreach ($servers as &$server){
                $n = new MinecraftQuery();
                try
                {
                    $n->Connect( $server['ip'], $server['port'], 1 );
                }
                catch( MinecraftQueryException $e )
                {
                    $Exception = $e;
                }
                if($n->GetInfo() !== false ){
                    $serverInfo[] = $n->GetInfo();
                }
                $n++;
            } 
        }else{
            $serverInfo[0]['Players'] = 1;
            $serverInfo[0]['MaxPlayers'] = 50;
        }    
        // Подключаем вид
        require_once(ROOT . '/views/bar/index.php');
        return true;
    }
}
