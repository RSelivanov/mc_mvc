<?php

/**
 * Класс Server - модель для работы с серверами
 */
class Server
{

    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $servername <p>Название сервера</p>
     * @return array <p>Массив с информацией о сервере</p>
     */
    public static function getServers()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM ms_servers';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);

        // Указываем, что хотим получить данные в виде массива
        //$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetchAll();
    }
    
    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $servername <p>Название сервера</p>
     * @return array <p>Массив с информацией о сервере</p>
     */
    public static function getServer($servername)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM ms_servers WHERE name = :name';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $servername, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    
    
     /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $servername <p>Название сервера</p>
     * @return array <p>Массив с информацией о сервере</p>
     */
    public static function getBanlist($db_host, $db_name, $db_port, $db_user, $db_password)
    {
        // Соединение с БД

        $db = Db::getConnection($db_host, $db_name, $db_port, $db_user, $db_password);
        
        // Текст запроса к БД
        $sql = 'SELECT * FROM bans ORDER BY time DESC LIMIT 50';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
       
        //$result->bindParam(':name', $servername, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        //$result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return  $result->fetchAll();
    }
    
    
    /**
     * Проверяем существует ли пользователь с заданными $email и $password
     * @param string $servername <p>Название сервера</p>
     * @return array <p>Массив с информацией о сервере</p>
     */
    public static function getToplist()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT name, level FROM ms_users ORDER BY level DESC LIMIT 50';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        //$result->bindParam(':name', $servername, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->execute();

        return $result->fetchAll();
    }

}