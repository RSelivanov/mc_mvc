<?php

/**
 * Класс News - модель для работы с новостями
 */
class News
{
    /**
     * Добовляем новость
     * @param string $name <p>Имя пользователя</p>
     * @param string $content <p>Контент</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function addNews($name, $content)
    {
        $timestamp = date("Y-m-d H:i:s");
        
        $db = Db::getConnection();

        $sql = 'INSERT INTO ms_news (name, date, content) VALUES (:name, :date, :content)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':date', $timestamp, PDO::PARAM_STR);
        $result->bindParam(':content', $content, PDO::PARAM_STR);

        return $result->execute();
    }
    
    /**
     * Получить 30 последних новостей
     * @return Array <p>Массив</p>
     */
    public static function getNewsList()
    {
        $db = Db::getConnection();
        
        $newList = array();
        
        $result = $db->query('SELECT * FROM ms_news ORDER BY date DESC LIMIT 30');
        
        $i = 0;
        while ($row = $result->fetch()){
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['date'] = $row['date'];
            $newList[$i]['name'] = $row['name'];
            $newList[$i]['content'] = $row['content'];
            $newList[$i]['likes'] = $row['likes'];
            $i++;
        }
        
        return $newList;
    }
    
    /**
     * Получить 10 новостей конкретного пользователя
     * @param string $name <p>Имя пользователя</p>
     * @return Array <p>Массив</p>
     */
    public static function getNewsListByName($name)
    {
        $db = Db::getConnection();
        
        $newList = array();
        
        $sql = 'SELECT * FROM ms_news WHERE name = :name ORDER BY date DESC LIMIT 10';
        
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        
        $i = 0;
        while ($row = $result->fetch()){
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['date'] = $row['date'];
            $newList[$i]['name'] = $row['name'];
            $newList[$i]['content'] = $row['content'];
            $newList[$i]['likes'] = $row['likes'];
            $i++;
        }
        
        return $newList;
    }
    
    /**
     * Добовляем лайк к новости
     * @param int $id <p>Id новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function addLike($id)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE ms_news SET likes = (likes + 1) WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        return $result->execute();
    }
    
    /**
     * Убрать лайк из новости
     * @param int $id <p>Id новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function removeLike($id)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE ms_news SET likes = (likes - 1) WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        return $result->execute();
    }
    
     /**
     * Проверить лайкнута ли новость пользователем
     * @param int $user_id <p>Id пользователя</p>
     * @param int $news_id <p>Id новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkLike($user_id, $news_id)
    {      
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM mc_likes WHERE user_id = :user_id AND news_id = :news_id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_STR);
        $result->execute();
        
        if ($result->fetchColumn())
            return true;
        return false;
        

    }
    
    /**
     * Добавить лайк в таблицу монитеринга лайков
     * @param int $user_id <p>Id пользователя</p>
     * @param int $news_id <p>Id новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function addLikeIndicator($user_id, $news_id)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO mc_likes (user_id, news_id) VALUES (:user_id, :news_id)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_STR);

        return $result->execute();
    }
    
    /**
     * Убрать лайк из таблицы мониторинга лайков
     * @param int $user_id <p>Id пользователя</p>
     * @param int $news_id <p>Id новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function removeLikeIndicator($user_id, $news_id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM mc_likes WHERE user_id = :user_id AND news_id = :news_id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':user_id', $user_id, PDO::PARAM_STR);
        $result->bindParam(':news_id', $news_id, PDO::PARAM_STR);

        return $result->execute();
    }
    
    /**
     * Удалить новость
     * @param int $id <p>Id новости</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteNews($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM ms_news WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);

        return $result->execute();
    }
}