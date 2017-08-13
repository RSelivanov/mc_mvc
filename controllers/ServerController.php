<?php

/**
 * Контроллер ServerController
 */
class ServerController 
{
     /**
     * Action для страницы информации о сервере
     */
    public function actionServerinfo($servername)
    {   
        $server = Server::getServer($servername);
        if($server != false){
            $Query = new MinecraftQuery( );
            try
            {
                $Query->Connect( $server['ip'], $server['port'], 1 );
            }
            catch( MinecraftQueryException $e )
            {
                $Exception = $e;
            }
            if( ( $players = $Query->GetPlayers() ) !== false ){}

            // Подключаем вид
            require_once(ROOT . '/views/server/serverinfo.php');
            return true;
        }
        else
        {
            $content = 'Сервер не найден!';
            require_once(ROOT . '/views/content/empty.php');
        }
    }
    
     /**
     * Action для банлиста
     */
    public function actionBanlist($servername)
    {   
        $server = Server::getServer($servername);
       
        if($server != false){
            
            $banlist = Server::getBanlist($server['db_host'], $server['db_name'], $server['db_port'], $server['db_user'], $server['db_password']);

            // Подключаем вид
            require_once(ROOT . '/views/server/banlist.php');
            return true;
        }
        else
        {
            $content = 'Сервер не найден!';
            require_once(ROOT . '/views/content/empty.php');
        }
    }
    
    
     /**
     * Action для топлиста
     */
    public function actionToplist($servername)
    {   
        $server = Server::getServer($servername);
        if($server != false){
            
            $toplist = Server::getToplist();

            // Подключаем вид
            require_once(ROOT . '/views/server/toplist.php');
            return true;
        }
        else
        {
            $content = 'Сервер не найден!';
            require_once(ROOT . '/views/content/empty.php');
        }
    }
}
