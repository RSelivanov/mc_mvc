<?php

/**
 * Класс Guestbook - модель для работы гостевой книгой
 */
class Guestbook
{
    /**
     * Добавляет новую запись в гостевую книгу
     * @param string $username <p>User Name</p>
     * @param string $email <p>E-mail</p>
     * @param string $homepage <p>Домашная страница</p>
     * @param string $message <p>Сообщение</p>
     * @param string $file_name <p>Имя файла</p>
     * @param string $browser <p>Имя браузера</p>
     * @param string $ip <p>IP аддрес</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function addMessage($username, $email, $homepage, $message, $file_name, $browser, $ip)
    {
        $timestamp = date("Y-m-d H:i:s");
        
        $db = Db::getConnection();

        $sql = 'INSERT INTO mc_guestbook (date, username, email, homepage, message, file, browser, ip) VALUES (:date, :username, :email, :homepage, :message, :file, :browser, :ip)';
        
        $result = $db->prepare($sql);
        $result->bindParam(':date', $timestamp, PDO::PARAM_STR);
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':homepage', $homepage, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':file', $file_name, PDO::PARAM_STR);
        $result->bindParam(':browser', $browser, PDO::PARAM_STR);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);

        return $result->execute();
    }
    
    /**
     * Получает сообщения из гостевой книги начиная со $start в количестве $amount учитывая $search сортируя по $key в направлении $order
     * @param string $start <p>Индекс начала для LIMIT</p>
     * @param string $amount <p>Индекс количества для LIMIT</p>
     * @param string $search <p>Поисковая фраза</p>
     * @param string $key <p>Название столбца для сортировки</p>
     * @param string $order <p>Направление сортировки</p>
     * @return Array <p>Массив</p>
     */
    public static function getMessagesFromGuestbook($start, $amount, $search = '', $key = 'id', $order = 'desc')
    {
        $db = Db::getConnection();
        
        $newList = array();
        
        $search = self::searchTextConvert($search);
        
        $search = '%'.$search.'%';
        
        $allowed = array("date", "username", "email");
        $num     = array_search($key, $allowed); 
        $key = $allowed[$num];
        $order  = (mb_strtoupper($order) == 'DESC') ? 'DESC' : 'ASC';

        $sql = "SELECT * FROM mc_guestbook "
        . "WHERE date LIKE :search OR username LIKE :search OR email LIKE :search "
        . "OR homepage LIKE :search OR message LIKE :search OR file LIKE :search "
        . "ORDER BY $key $order LIMIT :start, :amount";
        
        $result = $db->prepare($sql);        
        $result->bindValue(':search', $search, PDO::PARAM_STR);
        $result->bindValue(':start', $start, PDO::PARAM_INT);
        $result->bindValue(':amount', $amount, PDO::PARAM_INT);

        $result->execute();

        $i = 0;
        while ($row = $result->fetch()){
            $newList[$i]['id'] = $row['id'];
            $newList[$i]['date'] = $row['date'];
            $newList[$i]['username'] = $row['username'];
            $newList[$i]['email'] = $row['email'];
            $newList[$i]['homepage'] = $row['homepage'];
            $newList[$i]['message'] = $row['message'];
            $newList[$i]['file'] = $row['file'];
            $i++;
        }
        
        return $newList;
    }

    /**
     * Получить количество сообщений в гостевой книге с учетом поиска
     * @return Array <p>Массив</p>
     */
    public static function countMessagesFromGuestbook($search)
    {
        $db = Db::getConnection();
        
        $newList = array();
        
        $search = self::searchTextConvert($search);
        
        $search = '%'.$search.'%';
                
        $sql = 'SELECT COUNT(*) as count FROM mc_guestbook WHERE date LIKE :search OR username LIKE :search OR email LIKE :search '
        . 'OR homepage LIKE :search OR message LIKE :search OR file LIKE :search ORDER BY date DESC LIMIT 25';
        
        $result = $db->prepare($sql);
        $result->bindValue(':search', $search, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();

        return $row['count'];
    }
    
     /**
     * Меняет направление сортировки
     * @param string $order <p>desc or asc</p>
     * @return string <p>Результат выполнения метода</p>
     */
    public static function reversOrder($order)
    {
        $order == 'desc' ? $order = 'asc' : $order = 'desc';

        return $order;
    }
    
    /**
     * Защищает данные от XSS-атак
     * @param string $data <p>Данные</p>
     * @return string <p>Результат выполнения метода</p>
     */
    public static function protectionData($data)
    {
        return strip_tags($data, '<a><code><i><strike><strong>'); //Удаляет HTML и PHP-теги из строки
        //$name = htmlentities($data, ENT_QUOTES, "UTF-8"); //Преобразует символы в соответствующие HTML сущности.
        //$name = htmlspecialchars($data, ENT_QUOTES); // Преобразует специальные символы в HTML-сущности
    }
    
    /**
     * Конвертирует текст поиска
     * @param string $text <p>Текст</p>
     * @return string <p>Результат выполнения метода</p>
     */
    public static function searchTextConvert($text)
    {
        $text = urldecode($text);
        
        $text == '0' ? $text = '' : $n = 1;
        
        return $text;
    }
    
    /**
     * Генерирует страницы (пагинатор)
     * @param int $messages <p>Количество сообщений</p>
     * @param int $page <p>Текущая страница</p>
     * @return Array <p>Результат выполнения метода</p>
     */
    public static function pagesGenerator($messages, $page)
    {
        $newList = array();
        
        //Получаем количество сообщений на странице
        $messages_amount = Config::getInstance()->get('messages_amount');
            
        // Находим общее число страниц 
        $total_pages = intval(($messages - 1) / $messages_amount) + 1; 


        // Определяем начало сообщений для текущей страницы 
        $page = intval($page);

        // Если значение $page меньше единицы или отрицательно 
        // переходим на первую страницу 
        // А если слишком большое, то переходим на последнюю 
        if(empty($page) or $page < 0) $page = 1; 
        if($page > $total_pages) $page = $total_pages;

        // Вычисляем начиная к какого номера 
        // следует выводить сообщения 
        $start = $page * $messages_amount - $messages_amount; 
        
        $newList['messages_amount'] = $messages_amount;
        $newList['total_pages'] = $total_pages;
        $newList['start'] = $start;
        
        return $newList;
    }
    
    /**
     * Возвращает браузер пользователя
     * @param int $user_agent <p>$_SERVER["HTTP_USER_AGENT"]</p>
     * @return string <p>Название браузера</p>
     */
    public static function getBrowser($user_agent)
    {
        if (strpos($user_agent, "Firefox") !== false) $browser = "Firefox";
        elseif (strpos($user_agent, "Opera") !== false) $browser = "Opera";
        elseif (strpos($user_agent, "Chrome") !== false) $browser = "Chrome";
        elseif (strpos($user_agent, "MSIE") !== false) $browser = "Internet Explorer";
        elseif (strpos($user_agent, "Safari") !== false) $browser = "Safari";
        else $browser = "Неизвестный";
        
        return $browser;
    }
    
    /**
     * Проверяет имя, допустимы цифры и буквы латинского алфавита а так же пустая строка
     * @param string $name <p>Имя</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkName($name)
    {
        if (preg_match('(^[a-zA-Z0-9]+$)', $name)) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверяет email на валидность
     * @param string $email <p>E-mail</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверяет url на валидность
     * @param string $url <p>Url</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkUrl($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            return true;
        }
        return false;
    }
    
    /**
     * Проверяет является ли файл изображением
     * @param string $file_type <p>Тип файла</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkFileImg($file_type)
    {
        $file_types_array = array( 'jpg' => 'image/jpeg', 'png' => 'image/png', 'gif' => 'image/gif' );
        
        if(in_array($file_type, $file_types_array)){
            return true;
        }
        return false;
    }
    
    /**
     * Проверяет является ли файл текстом
     * @param string $file_type <p>Тип файла</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function checkFileTxt($file_type)
    { 
        if($file_type === 'text/plain'){
            return true;
        }
        return false;
    }
    
    /**
     * Возвращает расширение файла
     * @param string $file_name <p>Имя файла</p>
     * @return string <p>Расширение файла</p>
     */
    public static function getFileExtension($file_name)
    { 
        $file_extension = explode(".", $file_name); 
        return array_pop($file_extension);
    }
    
    /**
     * Загружает файл
     * @param string $file <p>Массив $_FILES</p>
     * @return array <p></p>
     */
    public static function uploadFile($file, $filename)
    {
        if(self::checkFileImg($file['guest_file']['type'])){
            $image = new SimpleImage();
            $image->load($file['guest_file']['tmp_name']);
            $image->resizeToHeight(240);
            $image->resizeToWidth(320);

            $image->save(ROOT.Config::getInstance()->get('path_files').$filename);
        }
        
        if(self::checkFileTxt($file['guest_file']['type'])){
            move_uploaded_file($file['guest_file']['tmp_name'], ROOT.Config::getInstance()->get('path_files').$filename);
        }
        return true;
    }
    
    /**
     * Возвращает расшифровку для ошибок загрузки файла
     * @param int $id <p>id ошибки</p>
     * @return streeng <p></p>
     */
    public static function ErrUploadFile($id)
    {
       	$errUpload = array( 
            0 => 'Ошибок не возникло, файл был успешно загружен на сервер. ', 
            1 => 'Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini.', 
            2 => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме.', 
            3 => 'Загружаемый файл был получен только частично.', 
            4 => 'Файл не был загружен.', 
            6 => 'Отсутствует временная папка. Добавлено в PHP 4.3.10 и PHP 5.0.3.' 
        ); 
        return $errUpload[$id];
    }
    
    /**
     * Получает сообщение по id из гостевой книги
     * @param int $id <p>Id сообщения</p>
     * @return array <p>Массив с информацией о сообщении</p>
     */
    public static function getMessageOnIdFromGuestbook($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM mc_guestbook WHERE id = :id';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
    
     /**
     * Обновляет сообщение
     * @param int $id <p>Id строки</p>
     * @param string $username <p>User Name</p>
     * @param string $email <p>E-mail</p>
     * @param string $homepage <p>Homepage</p>
     * @param string $message <p>Text</p>
     * @param string $browser <p>Название браузера</p>
     * @param string $ip <p>Ip аддрес</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateMessageFromGuestbook($id, $username, $email, $homepage, $message, $browser, $ip)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE mc_guestbook SET username = :username, email = :email, homepage = :homepage, message = :message,"
        . " browser = :browser, ip = :ip  WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        
        $result->bindParam(':username', $username, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':homepage', $homepage, PDO::PARAM_STR);
        $result->bindParam(':message', $message, PDO::PARAM_STR);
        $result->bindParam(':browser', $browser, PDO::PARAM_STR);
        $result->bindParam(':ip', $ip, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    /**
     * Обновляет имя файла
     * @param int $id <p>Id строки</p>
     * @param string $file_name <p>Имя файла</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateFileNameFromGuestbook($id, $file_name)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE mc_guestbook SET file = :file WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        
        $result->bindParam(':file', $file_name, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $result->execute();
    }
    
    /**
     * Возвращает имя файла по id
     * @param int $id <p>Id строки</p>
     * @return string <p>Результат выполнения метода</p>
     */
    public static function getFileNameFromGuestbook($id)
    {
        // Соединение с БД        
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT file FROM mc_guestbook WHERE id = :id';

        // Получение результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $request = $result->fetch();
        
        return $request['file'];
    }
    
    /**
     * Удаляет файл
     * @param string $file_name <p>Имя файла</p>
     * @return string <p>Результат выполнения метода</p>
     */
    public static function deleteFileFromGuestbook($file_name)
    {
        unlink(ROOT.Config::getInstance()->get('path_files').$file_name);
        return true; 
    }
    
    /**
     * Удаляет сообщение из гостевой книги
     * @param int $id <p>Id строки</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function removeMessageFromGuestbook($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM mc_guestbook WHERE id = :id';
        
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }
}